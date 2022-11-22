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
        Schema::create('doctor_clinics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained();
            $table->foreignId('doctor_id')->constrained('users');
            $table->foreignId('specialist_id')->constrained('specialists');
            $table->timestamps();

            $table->unique(['clinic_id', 'doctor_id', 'specialist_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_clinics');
    }
};
