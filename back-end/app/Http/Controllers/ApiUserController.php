<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ResetPasswordUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\ResetPasswordUserEmail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiUserController extends BaseController
{

    const VALID_TOKEN = 60; // 60 minutes

    public function register(RegisterUserRequest $request)
    {
        $input = $request->all();

        $user = new User();
        $user->fill($input);
        $user->password = Hash::make($user->password);
        $user->save();
        $success['token'] = $user->createToken('home_care')->accessToken;
        $success['name'] = $user->name;
        return $this->sendRespone($success, 'Tạo tài khoản thành công');
    }

    public function login(LoginUserRequest $request)
    {
        $input = $request->all();

        if (auth('api')->attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])) {
            $user = User::where('email', $input['email'])->first();
            $success['name'] = $user->name;
            $success['id'] = $user->id;
            $success['role'] = $user->role;
            $success['token'] = $user->createToken('home_care')->accessToken;
            return $this->sendRespone($success, 'Đăng nhập thành công');
        } else {
            return $this->sendError('Sai tên tài khoản hoặc mật khẩu');
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
            return $this->sendError('Something went wrong!', $e->getMessage());
        }
    }

    public function resetPassword(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            return $this->sendError('The token is invalid.', [], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(self::VALID_TOKEN)->isPast()) {
            $passwordReset->delete();
            return $this->sendError('The token is invalid.', [], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $user->password = Hash::make($request->get('newPassword'));
        $user->save();
        $passwordReset->delete();

        return $this->sendRespone(null, 'change password success, please login!');
    }

    public function getAllUSer()
    {
        $users = User::latest()->get()->toArray();
        // Add name Enums from backends
        foreach ($users as &$user) {
            $user["role"] = UserRoleEnum::from($user["role"])->name;
        }
        return $this->sendRespone($users, "Kết nối thành công");
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
                "avatar",
                "phone",
                "address",
                "gender",
                "birthday",
                "role",
            ]);
            $arr['password'] = Hash::make('123123');
            $user = new User();
            $user->fill($arr);
            $user->save();
            // UserCreateEvent::dispatch($user);
            return $this->sendRespone(null, "Tạo tài khoản thành công");
        } catch (Exception $e) {
            return $this->sendError('Tạo tài khoản thất bại', $e->getMessage());
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
            return $this->sendError('Xóa thất bại', $e->getMessage());
        }
    }
}
