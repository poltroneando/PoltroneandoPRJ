<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneroTituloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_titulo', function (Blueprint $table) {
            $table->increments('id_genero_titulo');
            $table->integer('id_genero')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->unique(['id_genero','id_titulo'],'uk_genero_titulo');
            $table->foreign('id_titulo','fk_genero_titulo_titulo')
            ->references('id_titulo')
            ->on('titulo')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_genero','fk_genero_titulo_genero')
            ->references('id_genero')
            ->on('genero')
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
        Schema::drop('genero_titulo');
    }
}
