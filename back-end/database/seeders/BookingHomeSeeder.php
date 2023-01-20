<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\BookingHome;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookingHomeSeeder extends Seeder
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
        $serviceArray = Service::query()->pluck('id')->toArray();
        $userArray = User::query()->where('role', UserRoleEnum::Doctor)->pluck('id')->toArray();
        for ($i = 0; $i < 150; $i++) {
            $arr[] = [
                'booking_id' => "BH".Str::random(8),
                'patient_id' => $faker->randomElement($patientArray),
                'doctor_id' => $faker->randomElement($userArray),
                'service_id' => $faker->randomElement($serviceArray),
                'time_booking' => $faker->numberBetween(7, 21) . ':00',
                'date_booking' => $faker->dateTimeBetween('-1 years', '+1 years'),
                'email_notification' => $faker->email,
                'address' => $faker->address,
                'description' => 'Mô tả...',
                'price' => $faker->numberBetween(80000, 200000),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ];
        }
        BookingHome::insert($arr);
    }
}
