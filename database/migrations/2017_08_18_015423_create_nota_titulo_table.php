<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTituloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_titulo', function (Blueprint $table) {
            $table->increments('id_nota_titulo');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_titulo')->unsigned();
            $table->decimal('ordem',2,2)->nullable();
            $table->smallInteger('status')->nullable();
            $table->foreign('id_usuario','fk_nota_titulo_usuario')
            ->references('id_usuario')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_titulo','fk_nota_titulo_titulo')
            ->references('id_titulo')
            ->on('titulo')
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
        Schema::drop('nota_titulo');
    }
}
