<?php

namespace App\Models;

use App\Casts\StatusBookingEnumCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingClinic extends Model
{
    use HasFactory;

        /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => StatusBookingEnumCast::class,
    ];

}
