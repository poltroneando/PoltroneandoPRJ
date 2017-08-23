<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicado', function (Blueprint $table) {
            $table->increments('id_indicao');
            $table->integer('id_premiacao')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->integer('id_personalidade')->unsigned()->nullable();
            $table->smallInteger('ganhador');
            $table->foreign('id_premiacao','fk_indicado_premiacao')
            ->references('id_premiacao')
            ->on('premiacao')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_categoria','fk_indicado_categoria')
            ->references('id_categoria')
            ->on('categoria')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_titulo','fk_indicado_titulo')
            ->references('id_titulo')
            ->on('titulo')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_personalidade','fk_indicado_personalidade')
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
        Schema::drop('indicado');
    }
}
