<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTituloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulo', function (Blueprint $table) {
            $table->increments('id_titulo');
            $table->string('nome',255);
            $table->string('nome_original',255)->nullable();
            $table->integer('duracao')->nullable();
            $table->longText('sinopse')->nullable();
            $table->string('capa',255)->nullable();
            $table->integer('ano');
            $table->smallInteger('tipo');
            $table->integer('id_pais')->unsigned()->nullable();
            $table->foreign('id_pais','fk_titulo_pais')
            ->references('id_pais')
            ->on('pais')
            ->onDelete('set null')
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
        Schema::drop('titulo');
    }
}
