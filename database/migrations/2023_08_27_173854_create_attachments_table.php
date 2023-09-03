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
        Schema::create('student_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id');
            $table->string('file_name');
            $table->string('path');
            $table->tinyInteger('status')->default(1);
            $table->integer('type');
            $table->text('extra_attributes')->nullable()->default(null);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('register_id')->references('id')->on('student_registrations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
