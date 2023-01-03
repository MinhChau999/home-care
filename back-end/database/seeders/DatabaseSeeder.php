<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SpecialistSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(HealthRecordSeeder::class);
        $this->call(ClinicSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(DoctorClinicSeeder::class);
        $this->call(BookingClinicSeeder::class);
        $this->call(BookingHomeSeeder::class);
    }
}
