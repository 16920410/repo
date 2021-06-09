<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            // relaciones
            $table->unsignedBigInteger('reunion_id');
            $table->unsignedBigInteger('docente_id')->nullable();

            
            $table->foreign('reunion_id')
                ->references('id')->on('reuniones');
                
            $table->foreign('docente_id')
                ->references('id')->on('docentes');

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
        Schema::dropIfExists('asistencias');
    }
}
