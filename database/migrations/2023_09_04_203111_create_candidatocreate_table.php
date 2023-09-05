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
        Schema::create('candidatocreate', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('year');
            $table->string('estado_civil');
            $table->string('domicilio');
            $table->string('cv')->nullable();
            $table->date('fecha_registro');
            $table->string('vacante');
            $table->date('fecha_evaluacion');
            $table->string('estatus');
            $table->text('nota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatocreate');
    }
};
