<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_lista', function (Blueprint $table) {
            $table->increments('id_item_lista');
            $table->integer('id_lista')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->integer('ordem')->nullable();
            $table->foreign('id_lista','fk_item_lista_lista')
            ->references('id_lista')
            ->on('lista')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_titulo','fk_item_lista_titulo')
            ->references('id_titulo')
            ->on('titulo')
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
        Schema::drop('item_lista');
    }
}
