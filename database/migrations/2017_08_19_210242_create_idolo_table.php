<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdoloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idolo', function (Blueprint $table) {
            $table->increments('id_idolo');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_personalidade')->unsigned();
            $table->foreign('id_usuario','fk_idolo_usuario')
            ->references('id_usuario')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_personalidade','fk_idolo_personalidade')
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
        Schema::drop('idolo');
    }
}
