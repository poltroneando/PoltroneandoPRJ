<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->increments('id_noticia');
            $table->string('link_noticia',1000);
            $table->longText('resumo');
            $table->integer('id_origem')->unsigned();
            $table->time('hora_publicacao')->nullable();
            $table->date('data_publicacao')->nullable();
            $table->unique('link_noticia','uk_noticia');
            $table->foreign('id_origem','fk_noticia_site_origem')
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
        Schema::drop('noticia');
    }
}
