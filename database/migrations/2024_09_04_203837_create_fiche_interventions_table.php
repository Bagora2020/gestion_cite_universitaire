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
        Schema::create('fiche_interventions', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->string('nom');
            $table->string('Secteur');
            $table->string('matieres');
            $table->string('observation');
            $table->string('numSerie');
            $table->string('objet'); 
            $table->string('lieu'); 

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_interventions');
    }
};
