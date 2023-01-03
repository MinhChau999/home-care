<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Specialist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
        $specialistArray = Specialist::query()->pluck('id')->toArray();
        $arr[] = [
            'name' => "Dịch vụ khám bệnh tại nhà",
            'specialist_id' => $faker->randomElement($specialistArray),
            'price' => $faker->numberBetween(80000, 200000),
            'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
        ];
        $arr[] = [
            'name' => "Dịch vụ truyền dịch",
            'specialist_id' => $faker->randomElement($specialistArray),
            'price' => $faker->numberBetween(80000, 200000),
            'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
        ];
        $arr[] = [
            'name' => "Dịch vụ tháo bột",
            'specialist_id' => $faker->randomElement($specialistArray),
            'price' => $faker->numberBetween(80000, 200000),
            'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
        ];

        $arr[] = [
            'name' => "Dịch vụ thay băng vết thương",
            'specialist_id' => $faker->randomElement($specialistArray),
            'price' => $faker->numberBetween(80000, 200000),
            'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
        ];

        $arr[] = [
            'name' => "Dịch vụ xét nghiệm",
            'specialist_id' => $faker->randomElement($specialistArray),
            'price' => $faker->numberBetween(80000, 200000),
            'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
        ];

        $arr[] = [
            'name' => "Dịch vụ châm cứu",
            'specialist_id' => $faker->randomElement($specialistArray),
            'price' => $faker->numberBetween(80000, 200000),
            'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
        ];
        Service::insert($arr);
    }
}
