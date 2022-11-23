<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends BaseController
{
    public function register(RegisterUserRequest $request){
        $input = $request->all();

        $user = new User();
        $user->fill($input);
        $user->password = Hash::make($user->password);
        $user->save();
        $success['token'] = $user->createToken('home_care')->accessToken;
        $success['name'] = $user->name;
        return $this->sendRespone($success, 'Tạo tài khoản thành công');
    }

    public function login(LoginUserRequest $request){
        $input = $request->all();

        if(auth('api')->attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])){
            $user = User::where('email', $input['email'])->first();
            $success['token'] = $user->createToken('home_care')->accessToken;
            $success['name'] = $user->name;
            return $this->sendRespone($success, 'Đăng nhập thành công');
        } else {
            return $this->sendError('Thất bại', ['error'=>'Sai tên tài khoản hoặc mật khẩu']);
        }
    }
}
