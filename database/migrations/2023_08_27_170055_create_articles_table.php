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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('body')->comment('Content of the post');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status');
            $table->integer('type')->comment('ARTICLE/PENGUMUMAN');
            $table->string('thumbnail');
            $table->integer('category_id');
            $table->text('extra_attributes')->nullable()->default(null);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');

            // Indexes for performance
            $table->index('id');
            $table->index('slug');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
