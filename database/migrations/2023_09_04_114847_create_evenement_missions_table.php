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
        Schema::create('evenement_missions', function (Blueprint $table) {
            $table->id();
            $table->string('NomEvenement')->nullable();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('observation')->nullable();
            $table->string('retex')->nullable();
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenement_missions');
    }
};