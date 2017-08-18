<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElencoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elenco', function (Blueprint $table) {
            $table->increments('id_elenco');
            $table->string('nome');
            $table->integer('id_personalidade')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->foreign('id_titulo','fk_elenco_titulo')
            ->references('id_titulo')
            ->on('titulo')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_personalidade','fk_elenco_personalidade')
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
        Schema::drop('elenco');
    }
}
