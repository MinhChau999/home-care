<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_clinics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('doctor_clinic_id')->constrained();
            $table->date('date_booking');
            $table->time('time_booking');
            $table->double('price')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->unique(['patient_id', 'doctor_clinic_id', 'date_booking', 'time_booking'], 'unique_doctor_clinic_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_clinics');
    }
};
