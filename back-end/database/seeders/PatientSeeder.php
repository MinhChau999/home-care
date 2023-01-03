<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 1; $i <= 100; $i++) {
            $arr[] = [
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->email,
                'password' => Hash::make('123123'),
                'phone' => $faker->phoneNumber,
                'avatar' => '/uploads/avatar.png',
                'address' => $faker->address,
                'gender' => $faker->boolean,
                'birthday' => $faker->date,
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ];
        }
        Patient::insert($arr);
    }
}
