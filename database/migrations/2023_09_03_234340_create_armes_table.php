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
        Schema::create('armes', function (Blueprint $table) {
            $table->id();
            $table->string("noSerieArme")->unique();
            $table->string('nom');
            $table->string('marque');
            $table->string('type');
            $table->string('date');
            $table->enum('etat',['Bon état','Mauvais état réparable','Mauvais état non réparable'])->default('Bon état');
            $table->string('provenance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armes');
    }
};
