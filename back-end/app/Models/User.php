<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "email",
        "password",
        "avatar",
        "phone",
        "address",
        "gender",
        "birthday",
        "role",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRoleEnum::class,
    ];

    public function isAdmin()
    {
        if ($this->role == UserRoleEnum::Admin) {
            return true;
        }
        return false;
    }

    public function isDoctor()
    {
        if ($this->role == UserRoleEnum::Doctor) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if (strcasecmp(($this->role->name), $role) == 0) {
            return true;
        }
        return false;
    }
}
