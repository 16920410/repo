<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('departamento');
            $table->string('responsable');
            $table->string('nresidente');
            $table->string('alumno')->nullable;

            //relacion de la base de datos

            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('carrera_id');


            $table->foreign('docente_id')
                ->references('id')->on('docentes');

            $table->foreign('carrera_id')
                ->references('id')->on('carreras');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
