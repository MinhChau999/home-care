<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStatusBookingRequest;
use App\Models\BookingClinic;
use App\Models\BookingHome;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Specialist;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiBookingController extends BaseController
{
    public function getAllBookingHomes()
    {
        try {
            $bookings = BookingHome::query()
                ->select(
                    "booking_homes.id",
                    "booking_homes.booking_id as booking",
                    "booking_homes.date_booking as date",
                    "booking_homes.time_booking as time",
                    "booking_homes.email_notification",
                    "booking_homes.address",
                    "booking_homes.status",
                    "booking_homes.doctor_id",
                    "booking_homes.service_id",
                    "booking_homes.patient_id",
                    "patients.name as patient",
                    "patients.avatar as patient_avatar",
                    "services.name as service",
                    "users.name as doctor",
                    "users.avatar as doctor_avatar",
                )
                ->join("patients", "patients.id", "=", "booking_homes.patient_id")
                ->join("users", "users.id", "=", "booking_homes.doctor_id")
                ->join("services", "services.id", "=", "booking_homes.service_id")
                ->orderBy('booking_homes.created_at', 'desc')
                ->get();
            foreach ($bookings as $booking) {
                $booking["statusName"] = $booking->status->name;
                $booking["doctor_avatar"] = Storage::disk('public')->url($booking['doctor_avatar']);
                $booking["patient_avatar"] = Storage::disk('public')->url($booking['patient_avatar']);
                $booking["date"] = $this->convertDate($booking["date"]);
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
                    "booking_clinics.id",
                    "booking_clinics.booking_id as booking",
                    "booking_clinics.date_booking as date",
                    "booking_clinics.time_booking as time",
                    "booking_clinics.email_notification",
                    "booking_clinics.status",
                    "doctor_clinics.doctor_id",
                    "doctor_clinics.clinic_id",
                    "patients.name as patient",
                    "patients.avatar as patient_avatar",
                    "services.name as service",
                    "users.name as doctor",
                    "users.avatar as doctor_avatar",
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
                $booking["doctor_avatar"] = Storage::disk('public')->url($booking['doctor_avatar']);
                $booking["patient_avatar"] = Storage::disk('public')->url($booking['patient_avatar']);
            }
            return $this->sendRespone($bookings, "Kết nối thành công");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    // CRUD functions

    public function updateStatusBookingHome(UpdateStatusBookingRequest $request, BookingHome $booking)
    {
        try {
            $status = $request->status;
            $booking->status = $status;
            $booking->save();
            $success["status"] = $booking->status;
            $success["statusName"] = $booking->status->name;
            return $this->sendRespone($success, "Successful update");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function editBookingHome(BookingHome $booking)
    {
        try {
            $patient = Patient::find($booking->patient_id);
            $doctor = User::find($booking->doctor_id);
            $service = Service::find($booking->service_id);
            $specialist = Specialist::find($service->specialist_id);
            $success['booking'] = $booking;
            $success['patient'] = $patient;
            $success['doctor'] = $doctor;
            $success['service'] = $service;
            $success['specialist'] = $specialist;
            return $this->sendRespone($success, "Successful get data");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }

    public function destroyBookingHome(BookingHome $booking)
    {
        try {
            $booking->delete();
            return $this->sendRespone(null, "Successfully deleted");
        } catch (Exception $e) {
            return $this->sendError('Something wrong. Please try again!!', $e->getMessage());
        }
    }
}
