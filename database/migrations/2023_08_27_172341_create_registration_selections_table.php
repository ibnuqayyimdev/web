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
        Schema::create('registration_selections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_schedule_id');
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('extra_attributes')->nullable()->default(null);
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
        Schema::dropIfExists('registration_selections');
    }
};
