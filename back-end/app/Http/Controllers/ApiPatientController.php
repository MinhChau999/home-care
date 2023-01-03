<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPatientRequest;
use App\Http\Requests\RegisterPatiantRequest;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApiPatientController extends BaseController
{
    public function register(RegisterPatiantRequest $request){
        $input = $request->all();

        $patiant = new Patient();
        $patiant->fill($input);
        $patiant->password = Hash::make($patiant->password);
        $patiant->save();
        
        $success['name'] = $patiant->name;
        $success['token'] = $patiant->createToken('home_care')->accessToken;
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
            
            $success['name'] = $patient->name;
            $success['token'] = $patient->createToken('home_care')->accessToken;
            return $this->sendRespone($success, 'Đăng nhập thành công');
        } else {
            return $this->sendError('Đăng nhập không thành công', ['error' => 'Sai tên tài khoản hoặc mật khẩu']);
        }
    }

    // Get data patient information
    public function getAllPatient()
    {
        try {
            $patients = Patient::latest()->get()->toArray();
            // Add name Enums from backends
            foreach ($patients as &$patient) {
                $patient["avatar"] = Storage::disk('public')->url($patient['avatar']);
            }
            return $this->sendRespone($patients, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }
}
