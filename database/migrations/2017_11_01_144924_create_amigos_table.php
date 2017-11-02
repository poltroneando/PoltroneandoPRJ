<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amigos', function (Blueprint $table) {
            $table->increments('id_amigos');
            $table->integer('id_solicitante')->unsigned();
            $table->integer('id_solicitado')->unsigned();
            $table->date('data_solicitacao');
            $table->date('data_resposta')->nullable();
            $table->smallInteger('status')->nullable(); //0-Pendente; 1-Aprovado; 2-Rejeitado
            $table->foreign('id_solicitante','fk_amigo_socilitante')
            ->references('id_usuario')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_solicitado','fk_amigo_solicitado')
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
        Schema::drop('amigos');
    }
}
