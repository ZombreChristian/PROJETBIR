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
        Schema::create('moyenpostes', function (Blueprint $table) {
            $table->id();
            $table->string('moy_serie');
            $table->string('moy_libelle');
            $table->string('moy_modele');
            $table->string('moy_origine');
            $table->string('moy_etat');
            $table->integer('moy_nbre');
            $table->string('moy_observ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moyenpostes');
    }
};
