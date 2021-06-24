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

            $table->unsignedBigInteger('docente_id');

            $table->foreign('docente_id')
                ->references('id')->on('docentes');

            $table->string('semestre');

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
        Schema::dropIfExists('liberacions');
    }
}
