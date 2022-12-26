<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;

class ApiEnumController extends BaseController
{
    public function getRoleUser(){
        $role = array_column(UserRoleEnum::cases(), 'value', 'name');
        return $this->sendRespone($role, "Thành công");
    }
}
