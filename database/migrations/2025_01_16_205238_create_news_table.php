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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title'); // Arabic title
            $table->string('en_title'); // English title
            $table->string('ar_subtitle'); // Arabic subtitle
            $table->string('en_subtitle'); // English subtitle
            $table->string('ar_head'); // Arabic head
            $table->string('en_head'); // English head
            $table->text('ar_content'); // Arabic content
            $table->text('en_content'); // English content
            $table->string('image1_path'); // Path for the first image
            $table->string('image2_path'); // Path for the second image
            $table->boolean('flag')->default(false); // Flag to show this news in front
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
