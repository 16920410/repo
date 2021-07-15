<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesAndElaborationFieldsToReunionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reuniones', function (Blueprint $table) {
            $table->time('hora_inicio');
            $table->time('hora_fin');
             
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reuniones', function (Blueprint $table) {
            $table->dropColumn('hora_inicio');
            $table->dropColumn('hora_fin');
            //
        });
    }
}
