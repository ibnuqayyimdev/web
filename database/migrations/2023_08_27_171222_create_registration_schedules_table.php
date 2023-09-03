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
        Schema::create('registration_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->tinyInteger('type');
            $table->tinyInteger('status');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('period');
            $table->integer('batch');
            $table->integer('registration_fee');
            $table->text('extra_attributes')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_schedules');
    }
};
