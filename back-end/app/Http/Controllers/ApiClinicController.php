<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Exception;
use Illuminate\Http\Request;

class ApiClinicController extends BaseController
{
    public function getAllClinic(){
        try {
            $clinics = Clinic::latest()->get();
            return $this->sendRespone($clinics, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }
}
