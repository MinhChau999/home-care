<?php

namespace Database\Seeders;

use App\Models\BookingClinic;
use App\Models\DoctorClinic;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookingClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        $patientArray = Patient::query()->pluck('id')->toArray();
        $doctorClinicArray = DoctorClinic::query()->pluck('id')->toArray();
        $serviceArray = Service::query()->pluck('id')->toArray();
        for ($i = 0; $i < 50; $i++) {
            $arr[] = [
                'booking_id' => "BC".Str::random(8),
                'patient_id' => $faker->randomElement($patientArray),
                'doctor_clinic_id' => $faker->randomElement($doctorClinicArray),
                'service_id' => $faker->randomElement($serviceArray),
                'time_booking' => $faker->numberBetween(7, 21) . ':00',
                'date_booking' => $faker->dateTimeBetween('-1 years', '+1 years'),
                'email_notification' => $faker->email,
                'patient_name_booking' => $faker->name,
                'patient_phone_booking' => $faker->phoneNumber,
                'patient_birth_booking' =>$faker->dateTimeBetween('-50 years', 'now'),
                'description' => 'Mô tả...',
                'price' => $faker->numberBetween(80000, 200000),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ];
        }
        BookingClinic::insert($arr);
    }
}
