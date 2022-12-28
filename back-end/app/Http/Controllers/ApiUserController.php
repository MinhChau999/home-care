<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Events\CreateUserEvent;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ResetPasswordUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\ResetPasswordUserEmail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApiUserController extends BaseController
{

    const VALID_TOKEN = 60; // 60 minutes

    // Authentication
    public function register(RegisterUserRequest $request)
    {
        try {
            $input = $request->all();
            $user = new User();
            $user->fill($input);
            $user->password = Hash::make($user->password);
            $user->save();
            $success['token'] = $user->createToken('home_care')->accessToken;
            $success['name'] = $user->name;
            return $this->sendRespone($success, 'Tạo tài khoản thành công');
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function login(LoginUserRequest $request)
    {
        try {
            $input = $request->all();
            if (auth('api')->attempt([
                'email' => $input['email'],
                'password' => $input['password']
            ])) {
                $user = User::where('email', $input['email'])->first();
                $success['name'] = $user->name;
                $success['id'] = $user->id;
                $success['role'] = $user->role;
                $success['roleName'] = $user->role->name;
                $success["avatar"] = Storage::disk('public')->url($user['avatar']);
                $success['token'] = $user->createToken('home_care')->accessToken;
                return $this->sendRespone($success, 'Đăng nhập thành công');
            } else {
                return $this->sendError('Sai tên tài khoản hoặc mật khẩu');
            }
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            $user = auth("api-admin")->user();
            $arr = $request->only([
                "name",
                "email",
                "phone",
                "address",
                "gender",
                "birthday",
            ]);
            if (!isset($request->gender)) {
                $arr["gender"] = 1;
            }
            if ($request->hasFile('avatar')) {
                // The request contains a file with the 'file' input name.
                $file = $request->file("avatar");
                // Generate a unique filename and move the uploaded file to the "public" disk
                $filename = uniqid() . '.' . $file->extension();
                $file->move(storage_path('app/public/uploads'), $filename, 'public');
                $arr['avatar'] = '/uploads/' . $filename;
                // Generate the URL for the file
                // $url = Storage::disk('public')->url($arr['avatar']);
            }
            $user->fill($arr);
            $user->save();
            // if (isset($request->password)) {
            //     // Update the user's password
            //     $user->update([
            //         'password' => Hash::make($request->password),
            //     ]);

            //     // Revoke all of the user's tokens
            //     $user->tokens->each(function ($token) {
            //         $token->revoke();
            //     });
            //     $user["changePassword"] = true;
            // }
            $user["avatar"] = Storage::disk('public')->url($user['avatar']);
            $user['roleName'] = $user->role->name;
            $success["user"] = $user;
            return $this->sendRespone($success, "Cập nhật thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            // Get the user
            $user = auth('api-admin')->user();

            // Check the current password
            if (!Hash::check($request->current_password, $user->password)) {
                // Return an error if the current password is incorrect
                return $this->sendError("The current password is incorrect");
            }

            // Update the user's password
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            // Revoke all of the user's tokens
            $user->tokens->each(function ($token) {
                $token->revoke();
            });

            // Redirect to the dashboard with a success message
            return $this->sendRespone([], 'Your password and tokens have been updated');
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function sendMail(ResetPasswordUserRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            $passwordReset = PasswordReset::updateOrCreate([
                'email' => $user->email,
            ], [
                'token' => Str::random(60),
            ]);

            // $passwordReset = PasswordReset::broker('users')->firstOrNew([
            //     'email' =>  request('email'), 
            //     'token' => Str::random(60),
            // ]);
            // Giới hạn số lần reset password
            // if (Carbon::parse($passwordReset->created_at)->addDay()->isPast()) {
            //     return $this->sendError('Thất bại', ['error' => 'something went wrong!']);
            // }

            if ($passwordReset) {
                $user->notify(new ResetPasswordUserEmail($passwordReset->token));
            }

            return $this->sendRespone(null, 'We have e-mailed your password reset link!');
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function resetPassword(ResetPasswordRequest $request, $token)
    {
        try {
            $passwordReset = PasswordReset::where('token', $token)->first();

            if (!$passwordReset) {
                return $this->sendError('The token is invalid.', [], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if (Carbon::parse($passwordReset->updated_at)->addMinutes(self::VALID_TOKEN)->isPast()) {
                $passwordReset->delete();
                return $this->sendError('The token is invalid.', [], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $user = User::where('email', $passwordReset->email)->firstOrFail();
            $user->password = Hash::make($request->get('password'));
            $user->save();
            // Revoke all of the user's tokens
            $user->tokens->each(function ($token) {
                $token->revoke();
            });
            $passwordReset->delete();

            return $this->sendRespone(null, 'Change password success, please login!');
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    // get data user

    public function getAllUSer()
    {
        try {
            $users = User::latest()->get()->toArray();
            // Add name Enums from backends
            foreach ($users as &$user) {
                $user["role"] = UserRoleEnum::from($user["role"])->name;
                $user["avatar"] = Storage::disk('public')->url($user['avatar']);
            }
            return $this->sendRespone($users, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function getUserByToken()
    {
        try {
            $user = auth('api-admin')->user();
            $user['roleName'] = $user->role->name;
            $user["avatar"] = Storage::disk('public')->url($user['avatar']);
            return $this->sendRespone($user, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        try {
            $user['roleName'] = $user->role->name;
            $user["avatar"] = Storage::disk('public')->url($user['avatar']);
            return $this->sendRespone($user, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    /**
     * Add the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */

    public function store(StoreUserRequest $request)
    {
        try {
            $arr = $request->only([
                "name",
                "email",
                "phone",
                "address",
                "gender",
                "birthday",
                "role",
            ]);
            if (!isset($request->gender)) {
                $arr["gender"] = 1;
            }
            if (!isset($request->name)) {
                $arr["name"] = "User Name";
            }
            // return $request->file('avatar');
            if ($request->hasFile('avatar')) {
                // The request contains a file with the 'file' input name.
                $file = $request->file("avatar");
                // Generate a unique filename and move the uploaded file to the "public" disk
                $filename = uniqid() . '.' . $file->extension();
                $file->move(storage_path('app/public/uploads'), $filename, 'public');
                $arr['avatar'] = '/uploads/' . $filename;
                // Generate the URL for the file
                // $url = Storage::disk('public')->url($arr['avatar']);
            } else {
                // Get the full paths to the source and destination files
                $source = public_path('image/avatar.png');
                $destination = storage_path('app/public/uploads/avatar.png');
                // Check if the file already exists
                if (!File::exists($destination)) {
                    // Move the file
                    File::move($source, $destination);
                }
                $arr['avatar'] = '/uploads/avatar.png';
            }

            $arr['password'] = Hash::make('123123');
            $user = new User();
            $user->fill($arr);
            $user->save();
            CreateUserEvent::dispatch($user);
            return $this->sendRespone(null, "Tạo tài khoản thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $arr = $request->only([
                "name",
                "email",
                "phone",
                "address",
                "gender",
                "birthday",
            ]);
            if (!isset($request->gender)) {
                $arr["gender"] = 1;
            }
            if ($request->hasFile('avatar')) {
                // The request contains a file with the 'file' input name.
                $file = $request->file("avatar");
                // Generate a unique filename and move the uploaded file to the "public" disk
                $filename = uniqid() . '.' . $file->extension();
                $file->move(storage_path('app/public/uploads'), $filename, 'public');
                $arr['avatar'] = '/uploads/' . $filename;
            }
            $user->fill($arr);
            $user->save();
            $user["avatar"] = Storage::disk('public')->url($user['avatar']);
            $user['roleName'] = $user->role->name;
            $success["user"] = $user;
            return $this->sendRespone($success, "Cập nhật thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function updatePassword(UpdateUserPasswordRequest $request, User $user)
    {
        try {
            // Check the current password
            if (!Hash::check($request->current_password, $user->password)) {
                // Return an error if the current password is incorrect
                return $this->sendError("The current password is incorrect");
            }

            // Update the user's password
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            // Revoke all of the user's tokens
            $user->tokens->each(function ($token) {
                $token->revoke();
            });

            // Redirect to the dashboard with a success message
            return $this->sendRespone([], 'User password and tokens have been updated');
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userLogged = auth('api-admin')->user();
        if ($userLogged->id == $user->id) {
            return $this->sendError('Xóa thất bại');
        }
        try {
            $user->delete();
            return $this->sendRespone(null, 'Xóa thành công');
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }
}
