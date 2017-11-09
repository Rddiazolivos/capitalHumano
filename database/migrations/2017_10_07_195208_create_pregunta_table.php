<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto');
            $table->string('explicacion');
            $table->integer('encuesta_id')->unsigned()->default(1);
            $table->foreign('encuesta_id')->references('id')->on('encuestas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('area_id')->unsigned()->default(1);
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('preguntas');
    }
}
