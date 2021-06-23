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
        Schema::create('convalidaciones', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('materia_externa');
            $table->unsignedBigInteger('materia_interna');

            $table->timestamps();

            $table->foreign('materia_interna')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('materia_externa')->references('id')->on('materias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_estudios');
        Schema::dropIfExists('materias_plan');
        Schema::dropIfExists('convalidaciones');
        Schema::dropIfExists('carreras_tecnologicos');
        Schema::table('carreras', function (Blueprint $table) {
            $table->dropColumn('plan_id');
            $table->dropColumn('clave');
        });
    }
}
