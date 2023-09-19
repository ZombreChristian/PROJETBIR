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
        Schema::create('bon_moto', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('bon_id');
        $table->foreign('bon_id')->references('id')->on('bons')->onDelete('cascade');

        $table->unsignedBigInteger('moto_id');
        $table->foreign('moto_id')->references('id')->on('motos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_moto');
    }
};
