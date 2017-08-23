<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacao', function (Blueprint $table) {
            $table->increments('id_notificacao');
            $table->date('data_notificacao')->nullable();
            $table->time('hora_notificacao')->nullable();
            $table->smallInteger('lida')->nullable()->default(0);
            $table->date('data_lida')->nullable();
            $table->time('hora_lida')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->string('descricao',255)->nullable();
            $table->foreign('id_usuario','fk_notificacao_usuario')
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
        Schema::drop('notificacao');
    }
}
