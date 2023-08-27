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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->integer('type')->comment('EX: BAYAR SPP, BAYAR PENDAFTARAN');
            $table->string('attachments');
            $table->tinyInteger('status');
            $table->text('extra_attributes')->nullable()->default(null);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('model_id')->references('id')->on('student_registers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
