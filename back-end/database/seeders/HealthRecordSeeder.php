<?php

namespace Database\Seeders;

use App\Models\HealthRecord;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class HealthRecordSeeder extends Seeder
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
        for ($i = 0; $i < 50; $i++) {
            $arr[] = [
                'patient_id' => $faker->randomElement($patientArray),
                'date' => $faker->dateTimeBetween('-1 years', '+1 years'),
                'note' => 'Ghi chú...',
                'symptom' => 'Triệu chứng...',
                'diagnostic' => 'Chuẩn đoán...',
                'treatment' => 'Trị liệu...',
                'medicine' => 'Thuốc...',
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ];
        }
        HealthRecord::insert($arr);
    }
}
