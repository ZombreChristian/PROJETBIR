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
        Schema::create('munitions', function (Blueprint $table) {
            $table->id();
            $table->string("noSerieMuni")->unique();
            $table->string('nom');
            $table->enum('type',['Cartouches pour armes portatives',"Obus",'Roquette',"Missiles",'Mines',"Grenades",'Explosifs et artifices de destruction',"Artifices eclairants et de signalisation",'Bombes']);
            $table->string('date');
            $table->string('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munitions');
    }
};
