<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiberacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liberacions', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('semestre');
            
            $table->timestamps();
           
            
            
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('elaboro_id');
            $table->unsignedBigInteger('valido_id');
            $table->foreign('docente_id')
            ->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('elaboro_id')
            ->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('valido_id')
            ->references('id')->on('docentes')->onDelete('cascade');
        });
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });
        Schema::create('reporte_actividades', function (Blueprint $table) {
            $table->unsignedBigInteger('liberacion_id');
            $table->unsignedBigInteger('actividad_id');
            $table->integer('evaluacion');
            $table->timestamps();

            $table->foreign('liberacion_id')
            ->references('id')->on('liberacions')->onDelete('cascade');
            $table->foreign('actividad_id')
            ->references('id')->on('actividades')->onDelete('restrict');
            
        });
        
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte_actividades');
        Schema::dropIfExists('actividades');
        Schema::dropIfExists('liberacions');
    }
}
