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
        Schema::create('burial_plots', function (Blueprint $table) {
            $table->id();
            $table->string('plot_number')->unique();
            $table->string('size');
            $table->integer('burial_type_id');
            $table->enum('status', ['Available', 'Reserved', 'Occupied'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burial_plots');
    }
};
