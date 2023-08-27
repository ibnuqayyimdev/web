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
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('npsn')->nullable()->default(null);
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->text('address');
            $table->text('about');
            $table->string('photo');
            $table->text('vision');
            $table->text('mission');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('extra_attributes')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
