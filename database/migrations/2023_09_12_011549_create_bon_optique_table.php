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
        Schema::create('bon_optique', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bon_id');
            $table->foreign('bon_id')->references('id')->on('bons')->onDelete('cascade');

            $table->unsignedBigInteger('optique_id');
            $table->foreign('optique_id')->references('id')->on('optiques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_optique');
    }
};
