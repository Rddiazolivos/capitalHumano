<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userrespuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(false);
            $table->string('nivel')->nullable();
            $table->string('resultado')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('evaluador_id')->unsigned();
            $table->foreign('evaluador_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('proyecto_id')->unsigned()->default(1);
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('userrespuesta');
    }
}
