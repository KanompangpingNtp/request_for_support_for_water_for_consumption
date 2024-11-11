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
        Schema::create('form_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
            // $table->enum('detail_type', ['utilities', 'consume']);
            $table->string('detail_type', 500);
            $table->date('detail_request_date');
            $table->float('capacity');
            $table->string('detail_use_water_to')->nullable();
            $table->string('detail_location')->nullable();
            $table->string('detail_village')->nullable();
            $table->string('detail_subdistrict')->nullable();
            $table->string('detail_district')->nullable();
            $table->string('detail_province')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_details');
    }
};
