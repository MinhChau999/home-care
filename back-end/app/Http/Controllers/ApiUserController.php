<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApiUserController extends BaseController
{
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
            return $this->sendError('Thất bại', ['error' => 'Sai tên tài khoản hoặc mật khẩu']);
        }
    }

    public function resetPassword()
    {
        $mailData = [
            'name' => "HelloWorld",
            'dob' => "12/12/2000",
        ];
        
        Mail::send('email.resetPassword', compact('mailData'), function ($email) use ($mailData) {
            $email->subject('Test email');
            $email->to('chaudai621@gmail.com', $mailData['name']);
        });
        dd("Mail sent successfully");
    }

    public function getAllUSer()
    {
        $users = User::latest()->get()->toArray();
        // Add name Enums from backends
        foreach ($users as &$user) {
            $user["role"] = UserRoleEnum::from($user["role"])->name;
        }
        return response()->json($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $buses
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userLogged = auth('api-admin')->user();
        if ($userLogged->id == $user->id) {
            return $this->sendError('Thất bại', ['error' => 'Xóa thất bại']);
        }
        try {
            $user->delete();
            return $this->sendRespone(null, 'Xóa thành công');
        } catch (\Exception $e) {
            return $this->sendError('Thất bại', ['error' => 'Xóa thất bại']);
        }
    }
}
