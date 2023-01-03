<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Profile;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
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
        $specialistArray = Specialist::query()->pluck('id')->toArray();
        foreach ($userArray as $user) {
            $arr[] = [
                'user_id' => $user,
                'specialist_id' => $faker->randomElement($specialistArray),
                'academic' => 'Đại học ' . $faker->name,
                'experience' => 'Kinh nghiệm ...',
                'workplaces' => 'Nơi làm việc...',

            ];
        }
        Profile::insert($arr);
    }
}
