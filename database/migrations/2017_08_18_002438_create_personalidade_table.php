<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalidade', function (Blueprint $table) {
            $table->increments('id_personalidade');
            $table->string('nome',255);
            $table->string('nome_original',255)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->date('data_obito')->nullable();
            $table->longText('biografia')->nullable();
            $table->integer('id_pais')->unsigned()->nullable();
            $table->foreign('id_pais','fk_personalidade_pais')
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
        Schema::drop('personalidade');
    }
}
