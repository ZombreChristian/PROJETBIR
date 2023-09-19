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
        Schema::create('arme_bon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bon_id');
            $table->foreign('bon_id')->references('id')->on('bons')->onDelete('cascade');

            $table->unsignedBigInteger('arme_id');
            $table->foreign('arme_id')->references('id')->on('armes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arme_bon');
    }
};
