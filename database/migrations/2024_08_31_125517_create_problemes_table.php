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
        Schema::create('problemes', function (Blueprint $table) {
            $table->id();
            $table->string('numSerie');
            $table->string('Appartement')->nullable();
            $table->string('NumChambre');
            $table->string('Objet');
            $table->json('images')->nullable();
            $table->string('message');
            $table->boolean('etat')->default(0);
            $table->foreignId('pavillon_NomPav')
            ->constrained('pavillons')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problemes');
    }
};
