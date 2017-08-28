<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteFavoritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_favorito', function (Blueprint $table) {
            $table->increments('id_site_favorito');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_site_origem')->unsigned();
            $table->unique(['id_usuario','id_site_origem'],'uk_site_favorito');
            $table->foreign('id_usuario','fk_site_favorito_usuario')
            ->references('id_usuario')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_site_origem','fk_site_favorito_site_origem')
            ->references('id_site_origem')
            ->on('site_origem')
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
        Schema::drop('site_favorito');
    }
}
