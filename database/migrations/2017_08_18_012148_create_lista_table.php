<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista', function (Blueprint $table) {
            $table->increments('id_lista');
            $table->integer('id_usuario')->unsigned();
            $table->string('descricao')->nullable();
            $table->smallInteger('favorito')->unsigned()->nullable();
            $table->foreign('id_usuario','fk_lista_usuario')
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
        Schema::drop('lista');
    }
}
