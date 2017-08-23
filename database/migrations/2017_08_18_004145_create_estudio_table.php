<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudio', function (Blueprint $table) {
            $table->increments('id_estudio');
            $table->string('nome',255);
            $table->integer('ano_inauguracao')->nullable();
            $table->integer('id_pais')->unsigned()->nullable();
            $table->foreign('id_pais','fk_estudio_pais')
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
        Schema::drop('estudio');        
    }
}
