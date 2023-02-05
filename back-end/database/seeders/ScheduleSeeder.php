<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
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
        for ($i = 0; $i < 20; $i++) {
            $arr[] = [
                'doctor_id' => $faker->randomElement($userArray),
                'time_of_day' => $faker->numberBetween(7, 21) . ':00',
                'day_of_week' => $faker->numberBetween(0, 7),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ];
        }
        Schedule::insert($arr);
    }
}
