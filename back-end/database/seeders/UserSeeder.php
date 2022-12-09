<?php

namespace Database\Seeders;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr =[];
        $faker = \Faker\Factory::create('vi_VN');
        for ($i=1;$i<=100;$i++){
            $arr[] = [
                'name'=> $faker->firstName . ' ' . $faker->lastName,
                'email'=> $faker->email,
                'password'=>Hash::make('123123'),
                'phone'=> $faker->phoneNumber,
                'address'=> $faker->address,
                'gender'=> $faker->boolean,
                'birthday'=> $faker->date,
                'role'=> $faker->randomElement(array_column(UserRoleEnum::cases(), 'value')),
            ];
        }
        User::insert($arr);
    }
}
