<?php

namespace App\Http\Controllers;

use App\Models\BookingClinic;
use App\Models\BookingHome;
use Exception;
use Illuminate\Http\Request;

class ApiBookingController extends BaseController
{
    public function getAllBookingHomes()
    {
        try {
            $bookings = BookingHome::query()
                ->select(
                    "booking_homes.*",
                    "users.name as userName",
                    "patients.name as patientName",
                    "services.name as serviceName"
                )
                ->join("patients", "patients.id", "=", "booking_homes.patient_id")
                ->join("users", "users.id", "=", "booking_homes.doctor_id")
                ->join("services", "services.id", "=", "booking_homes.service_id")
                ->orderBy('booking_homes.created_at', 'desc')
                ->get();
            foreach ($bookings as $booking) {
                $booking["statusName"] = $booking->status->name;
            }
            return $this->sendRespone($bookings, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function getAllBookingClinics()
    {
        try {
            $bookings = BookingClinic::query()
                ->select(
                    "booking_clinics.*",
                    "doctor_clinics.doctor_id",
                    "doctor_clinics.clinic_id",
                    "users.name as userName",
                    "patients.name as patientName",
                    "services.name as serviceName",
                )
                ->join("services", "services.id", "=", "booking_clinics.service_id")
                ->join("doctor_clinics", "doctor_clinics.id", "=", "booking_clinics.doctor_clinic_id")
                ->join("patients", "patients.id", "=", "booking_clinics.patient_id")
                ->join("users", "users.id", "=", "doctor_clinics.doctor_id")
                ->join("clinics", "clinics.id", "=", "doctor_clinics.clinic_id")
                ->orderBy('booking_clinics.created_at', 'desc')
                ->get();
            foreach ($bookings as $booking) {
                $booking["statusName"] = $booking->status->name;
            }
            return $this->sendRespone($bookings, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }
}
