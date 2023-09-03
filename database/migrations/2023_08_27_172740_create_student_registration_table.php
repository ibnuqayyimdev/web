<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('gender');
            $table->string('place_of_birth');
            $table->date('day_of_birth');
            $table->string('school_of_origin');
            $table->string('parent_name');
            $table->string('phone_number');
            $table->string('email');
            $table->unsignedBigInteger('province_id')->nullable()->default(null);
            $table->unsignedBigInteger('city_id')->nullable()->default(null);
            $table->unsignedBigInteger('district_id')->nullable()->default(null);
            $table->unsignedBigInteger('village_id')->nullable()->default(null);
            $table->string('zip_code')->comment('kode pos');
            $table->text('address');
            $table->text('extra_attributes')->nullable()->default(null);
            $table->tinyInteger('status')->default(0);
            $table->string('age');
            $table->date('year_of_graduation');
            $table->unsignedBigInteger('registration_schedule_id');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('registration_schedule_id')->references('id')->on('registration_schedules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};
