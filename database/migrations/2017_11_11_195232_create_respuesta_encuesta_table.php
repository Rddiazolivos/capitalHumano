
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor');
            $table->integer('pregunta_id')->unsigned()->default(1);
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('userrespuesta_id')->unsigned();
            $table->foreign('userrespuesta_id')->references('id')->on('userrespuesta')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('respuestas_proyectos');
    }
}
