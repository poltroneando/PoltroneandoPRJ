<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaPersonagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_personagem', function (Blueprint $table) {
            $table->increments('id_nota_personagem');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_elenco')->unsigned();
            $table->decimal('nota',2,2)->nullable();
            $table->foreign('id_usuario','fk_nota_personagem_usuario')
            ->references('id_usuario')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_elenco','fk_nota_personagem_elenco')
            ->references('id_elenco')
            ->on('elenco')
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
        Schema::drop('nota_personagem');
    }
}
