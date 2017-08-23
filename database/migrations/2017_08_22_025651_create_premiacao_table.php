<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premiacao', function (Blueprint $table) {
            $table->increments('id_premiacao');
            $table->integer('id_premio')->unsigned();
            $table->integer('ano');
            $table->foreign('id_premio','fk_premiacao_premio')
            ->references('id_premio')
            ->on('premio')
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
        Schema::drop('premiacao');
    }
}
