<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reuniones', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('lugar');
            $table->string('orden');
            $table->timestamps();
            $table->unsignedBigInteger('elaboro_id');
            $table->unsignedBigInteger('valido_id');
            
            $table->foreign('elaboro_id')
            ->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('valido_id')
            ->references('id')->on('docentes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reuniones');
    }
}
