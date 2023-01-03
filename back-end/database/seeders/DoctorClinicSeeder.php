<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Clinic;
use App\Models\DoctorClinic;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorClinicSeeder extends Seeder
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
        $userArray = User::query()->where('role', UserRoleEnum::Doctor)->pluck('id')->toArray();
        $clinicArray = Clinic::query()->pluck('id')->toArray();
        for ($i = 0; $i < 5; $i++) {
            $arr[] = [
                'clinic_id' => $faker->randomElement($clinicArray),
                'doctor_id' => $faker->randomElement($userArray),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ];
        }
        DoctorClinic::insert($arr);
    }
}
