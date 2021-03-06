<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrofeuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trofeu', function (Blueprint $table) {
            $table->increments('id_trofeu');
            $table->string('nome',255);
            $table->string('arte',255)->nullable();
            $table->string('regra',1000)->nullable();
            $table->smallInteger('nivel')->nullable();            
            $table->text('descricao')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trofeu');
    }
}
