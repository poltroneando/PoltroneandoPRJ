<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteOrigemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_origem', function (Blueprint $table) {
            $table->increments('id_site_origem');
            $table->string('nome',255);
            $table->string('nome_alternativo',255)->nullable();
            $table->string('url',255)->nullable();
            $table->string('logo',255)->nullable();
            $table->date('data_criacao')->nullable();
            $table->text('descricao')->nullable();
            $table->integer('id_pais')->unsigned()->nullable();
            $table->foreign('id_pais','fk_site_origem_pais')
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
        Schema::drop('site_origem');
    }
}
