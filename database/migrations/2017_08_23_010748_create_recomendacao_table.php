<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecomendacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomendacao', function (Blueprint $table) {
            $table->increments('id_recomendacao');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->integer('id_usuario_destino')->unsigned();
            $table->foreign('id_usuario','fk_recomendacao_usuario')
            ->references('id_usuario')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_titulo','fk_recomendacao_titulo')
            ->references('id_titulo')
            ->on('titulo')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_usuario_destino','fk_recomendacao_usuario_destino')
            ->references('id_usuario')
            ->on('usuario')
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
        Schema::drop('recomendacao');
    }
}
