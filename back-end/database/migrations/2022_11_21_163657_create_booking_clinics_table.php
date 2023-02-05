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
            $table->string('booking_id')->unique();
            $table->foreignId('patient_id')->constrained()->nullable();
            $table->foreignId('doctor_clinic_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->date('date_booking');
            $table->time('time_booking');
            $table->string('email_notification');
            $table->string('patient_name_booking')->nullable();
            $table->string('patient_phone_booking')->nullable();
            $table->date('patient_birth_booking')->nullable();
            $table->double('price')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();

            $table->unique([ 'doctor_clinic_id', 'date_booking', 'time_booking'], 'unique_doctor_clinic_time');
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
