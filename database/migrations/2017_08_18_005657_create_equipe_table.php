<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe', function (Blueprint $table) {
            $table->increments('id_equipe');
            $table->smallInteger('tipo');
            $table->integer('id_personalidade')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->foreign('id_titulo','fk_equipe_titulo')
            ->references('id_titulo')
            ->on('titulo')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_personalidade','fk_equipe_personalidade')
            ->references('id_personalidade')
            ->on('personalidade')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipe');
    }
}
