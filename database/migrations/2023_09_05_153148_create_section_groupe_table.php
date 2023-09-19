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
        Schema::create('section_groupe', function (Blueprint $table) {
            $table->id();
          
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('groupe_id');
    
            $table->unique(['section_id','groupe_id' ]);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_groupe');
    }
};