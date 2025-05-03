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
        Schema::create('scopes', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title'); // Arabic Title
            $table->string('en_title'); // English Title
            $table->text('ar_description'); // Arabic Description
            $table->text('en_description'); // English Description
            $table->string('icon'); // FontAwesome or Bootstrap icon class
            $table->string('color'); // Bootstrap color class (primary, success, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scopes');
    }
};
