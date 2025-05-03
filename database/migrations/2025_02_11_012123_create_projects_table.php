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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scope_id')->constrained()->onDelete('cascade'); // Foreign key to scopes
            $table->string('ar_name');
            $table->string('en_name');
            $table->text('ar_description')->nullable();
            $table->text('en_description')->nullable();
            $table->string('image')->nullable(); // Store image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
