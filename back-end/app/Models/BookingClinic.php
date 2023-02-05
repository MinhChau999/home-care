<?php

namespace App\Models;

use App\Casts\StatusBookingEnumCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingClinic extends Model
{
    use HasFactory;

    protected $fillable = [
        "booking_id",
        "patient_id",
        "doctor_clinic_id",
        "service_id",
        "date_booking",
        "time_booking",
        "email_notification",
        "patient_name_booking",
        "patient_phone_booking",
        "patient_birth_booking",
        "price",
        "description",
    ];

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
