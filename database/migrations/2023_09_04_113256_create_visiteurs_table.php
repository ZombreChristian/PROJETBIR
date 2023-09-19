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
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id();
            $table->string('vis_nom');
            $table->string('vis_prenom');
            $table->string('vis_genre');
            $table->string('type_piece');
            $table->string('num_piece');
            $table->string('vis_ser');
            $table->string('vis_tel');
            $table->string('aut_visiter');
            $table->string('vis_debut');
            $table->string('vis_fin');
            $table->string('vis_date');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiteurs');
    }
};
