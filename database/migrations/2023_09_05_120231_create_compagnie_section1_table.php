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
        Schema::create('compagnie_section', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compagnie_id');
            $table->unsignedBigInteger('section_id');
          
    
            $table->unique(['compagnie_id', 'section_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compagnie_section');
    }
};