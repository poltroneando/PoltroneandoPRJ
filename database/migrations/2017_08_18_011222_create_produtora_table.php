<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtora', function (Blueprint $table) {
            $table->increments('id_produtora');
            $table->integer('id_estudio')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->foreign('id_titulo','fk_produtora_titulo')
            ->references('id_titulo')
            ->on('titulo')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_estudio','fk_produtora_estudio')
            ->references('id_estudio')
            ->on('estudio')
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
        Schema::drop('produtora');
    }
}
