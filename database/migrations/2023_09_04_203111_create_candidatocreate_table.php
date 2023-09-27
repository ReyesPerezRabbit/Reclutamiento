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
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('estadoCivil')->nullable();
            $table->string('status');
            $table->string('vacante'); // Vacante a la que está aplicando el candidato
            $table->date('fechaRegistro'); // Fecha de registro del candidato
            $table->string('years'); // Sexo del candidato
            $table->string('domicilio'); // Domicilio del candidato
            $table->date('fechaEnvioEvaluacion')->nullable(); // Fecha de envío de la evaluación
            $table->text('observaciones')->nullable(); // Observaciones sobre el candidato
            $table->string('cv')->nullable(); // Nombre del archivo de CV del candidato (PDF o .doc)

            $table->string('fotografia')->nullable(); // Nombre del archivo de fotografía del candidato (PDF o .doc)
            $table->date('fechaNacimiento')->nullable(); // Fecha de nacimiento del candidato
            $table->string('sexo')->nullable(); // Sexo del candidato
            $table->string('telefono')->nullable(); // Número de teléfono del candidato
            $table->string('correoPersonal')->nullable(); // Correo personal del candidato
            $table->text('condicionesMedicas')->nullable(); // Condiciones médicas específicas del candidato
            $table->string('iq')->nullable(); // Puntaje de coeficiente intelectual (IQ) del candidato
            $table->integer('resultadosEvaluacion')->nullable(); // Resultados de la evaluación técnica (porcentaje)
            $table->string('conocimientos')->nullable(); // Conocimientos del candidato


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
