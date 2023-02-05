<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\StatusBookingEnumCast;

class BookingHome extends Model
{
    use HasFactory;
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $fillable = [
        "booking_id",
        "patient_id",
        "doctor_id",
        "service_id",
        "date_booking",
        "time_booking",
        "email_notification",
        "patient_name_booking",
        "patient_phone_booking",
        "patient_birth_booking",
        "address",
        "price",
        "description",
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => StatusBookingEnumCast::class,
    ];
}
