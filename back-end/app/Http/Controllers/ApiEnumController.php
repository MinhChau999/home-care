<?php

namespace App\Http\Controllers;

use App\Enums\StatusBookingEnum;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;

class ApiEnumController extends BaseController
{
    public function getRoleUser(){
        $role = array_column(UserRoleEnum::cases(), 'value', 'name');
        return $this->sendRespone($role, "Thành công");
    }

    public function getStatusBooking(){
        $status = array_column(StatusBookingEnum::cases(), 'value', 'name');
        return $this->sendRespone($status, "Thành công");
    }
}
