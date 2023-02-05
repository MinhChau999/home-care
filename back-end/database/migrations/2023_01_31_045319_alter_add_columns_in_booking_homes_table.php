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
        if (!Schema::hasColumn('booking_homes', 'patient_name_booking')) {
            Schema::table('booking_homes', function (Blueprint $table) {
                $table->string('patient_name_booking');
            });
        };

        if (!Schema::hasColumn('booking_homes', 'patient_phone_booking')) {
            Schema::table('booking_homes', function (Blueprint $table) {
                $table->string('patient_phone_booking');
            });
        };

        if (!Schema::hasColumn('booking_homes', 'patient_birth_booking')) {
            Schema::table('booking_homes', function (Blueprint $table) {
                $table->date('patient_birth_booking');
            });
        };

        // if (Schema::hasColumn('booking_homes', 'patient_id')) {
        //     Schema::table('booking_homes', function (Blueprint $table) {
        //         $table->foreignId('patient_id')->constrained()->nullable()->changed();
        //     });
        // };

        // Schema::table('booking_homes', function (Blueprint $table) {
        //     $table->dropUnique('unique_doctor_home_time');
        //     $table->unique(['doctor_id', 'date_booking', 'time_booking'], 'unique_doctor_home_time');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('booking_homes', 'patient_name_booking')) {
            Schema::table('booking_homes', function (Blueprint $table) {
                $table->dropColumn('patient_name_booking');
            });
        };

        if (Schema::hasColumn('booking_homes', 'patient_phone_booking')) {
            Schema::table('booking_homes', function (Blueprint $table) {
                $table->dropColumn('patient_phone_booking');
            }); 
        };


        if (Schema::hasColumn('booking_homes', 'patient_year_birth_booking')) {
            Schema::table('booking_homes', function (Blueprint $table) {
                $table->dropColumn('patient_year_birth_booking');
            });
        };
    }
};
