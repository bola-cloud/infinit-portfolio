<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('partner_categories', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name')->unique(); // Arabic Category Name
            $table->string('en_name')->unique(); // English Category Name
            $table->timestamps();
        });

        // Modify the partners table to reference partner_categories
        Schema::table('partners', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('image_path');
            $table->foreign('category_id')->references('id')->on('partner_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('partner_categories');
    }
};
