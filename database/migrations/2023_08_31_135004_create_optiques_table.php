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
        Schema::create('optiques', function (Blueprint $table) {
            $table->id();
            $table->string("noSerieOpt")->unique();
            $table->string('nom');
            $table->enum('type',['Appareil de vision de jour',"Appareil de vision de nocturne",'Appareil de mésure de distance',"Appareil de mésure des angles"]);
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optiques');
    }
};
