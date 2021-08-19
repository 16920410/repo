<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_estudios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('clave');


            $table->timestamps();
        });
        Schema::table('carreras', function (Blueprint $table) {
            $table->string('plan_id');
            $table->string('clave');
        });
        Schema::create('carreras_tecnologicos', function (Blueprint $table) {
            $table->unsignedBigInteger('tecnologico_id');
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('tecnologico_id')->references('id')->on('tecnologicos')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
        });
        Schema::create('materias_plan', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('materia_id');
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plan_estudios')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

        });
        Schema::create('porcentajes', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('materia_externa');
            $table->unsignedBigInteger('materia_interna');
            $table->integer('porcentaje');

            $table->timestamps();

            $table->foreign('materia_interna')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('materia_externa')->references('id')->on('materias')->onDelete('cascade');
        });
        Schema::create('convalidaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_alumno');
            $table->unsignedBigInteger('plan_externo');
            $table->unsignedBigInteger('plan_interno');
            $table->unsignedBigInteger('tecnologico_procedente');
            $table->unsignedBigInteger('tecnologico_receptor');
            $table->unsignedBigInteger('elaboro_id');
            $table->unsignedBigInteger('valido_id');
            
           


            $table->timestamps();
            $table->index(['plan_externo','plan_interno']);

            $table->foreign('plan_externo')->references('id')->on('plan_estudios')->onDelete('restrict');
            $table->foreign('plan_interno')->references('id')->on('plan_estudios')->onDelete('restrict');
            $table->foreign('tecnologico_procedente')->references('id')->on('tecnologicos')->onDelete('restrict');
            $table->foreign('tecnologico_receptor')->references('id')->on('tecnologicos')->onDelete('restrict');
            $table->foreign('elaboro_id')
            ->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('valido_id')
            ->references('id')->on('docentes')->onDelete('cascade');
        });
        Schema::create('convalidacion_materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('convalidacion_id');
            $table->unsignedBigInteger('materia_cursada');
            $table->unsignedBigInteger('materia_convalidada');
            $table->integer('calificacion');
            $table->integer('porcentaje');


            $table->timestamps();

            $table->foreign('materia_cursada')->references('id')->on('materias')->onDelete('restrict');
            $table->foreign('materia_convalidada')->references('id')->on('materias')->onDelete('restrict');
            $table->foreign('convalidacion_id')->references('id')->on('convalidaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convalidacion_materias');
        Schema::dropIfExists('materias_plan');
        Schema::dropIfExists('convalidaciones');
        Schema::dropIfExists('plan_estudios');
        Schema::dropIfExists('porcentajes');
        Schema::dropIfExists('carreras_tecnologicos');
        Schema::table('carreras', function (Blueprint $table) {
            $table->dropColumn('plan_id');
            $table->dropColumn('clave');
        });
    }
}
