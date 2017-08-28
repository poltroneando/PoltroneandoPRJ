<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrofeuUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trofeu_usuario', function (Blueprint $table) {
            $table->integer('id_trofeu')->unsigned();
            $table->integer('id_usuario')->unsigned();            
            $table->time('hora_realizacao')->nullable();
            $table->date('data_realizacao')->nullable();
            $table->primary(['id_trofeu','id_usuario']);
            $table->foreign('id_usuario','fk_trofeu_usuario_usuario')
            ->references('id_usuario')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_trofeu','fk_trofeu_usuario_trofeu')
            ->references('id_trofeu')
            ->on('trofeu')
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
        Schema::drop('trofeu_usuario');
    }
}
