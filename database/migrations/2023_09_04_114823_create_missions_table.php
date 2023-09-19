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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('codeMission')->nullable();
            $table->string('libelle')->nullable();;
            $table->integer('numeroOM');
            $table->string('nomMission')->nullable();
            $table->date('dateDebut')->nullable();;
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
        Schema::dropIfExists('missions');
    }
};