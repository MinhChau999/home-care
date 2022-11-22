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
        Schema::create('booking_homes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('doctor_id')->constrained('users');
            $table->date('date_booking');
            $table->time('time_booking');
            $table->string('service_id');
            $table->string('address');
            $table->double('price')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->unique(['patient_id', 'doctor_id', 'date_booking', 'time_booking'], 'unique_doctor_home_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_homes');
    }
};
