<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPatientRequest;
use App\Http\Requests\RegisterPatiantRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiPatientController extends BaseController
{
    public function register(RegisterPatiantRequest $request){
        $input = $request->all();

        $patiant = new Patient();
        $patiant->fill($input);
        $patiant->password = Hash::make($patiant->password);
        $patiant->save();
        
        $success['token'] = $patiant->createToken('home_care')->accessToken;
        $success['name'] = $patiant->name;
        return $this->sendRespone($success, 'Tạo tài khoản thành công');
    }

    public function login(LoginPatientRequest $request){
        $input = $request->all();
        if(auth()->attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])){
            $patient = Patient::where('email', $input['email'])->first();
            // $patient = auth()->user();
            
            $success['token'] = $patient->createToken('home_care')->accessToken;
            $success['name'] = $patient->name;
            return $this->sendRespone($success, 'Đăng nhập thành công');
        } else {
            return $this->sendError('Đăng nhập không thành công', ['error' => 'Sai tên tài khoản hoặc mật khẩu']);
        }
    }
}
