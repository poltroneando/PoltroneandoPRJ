<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('email_2')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->text('biografia')->nullable();
            $table->smallInteger('genero')->nullable();
            $table->string('foto')->nullable()->default('default.png');
            $table->string('celular')->nullable();
            $table->string('username',60)->unique()->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_gplus')->nullable();
            $table->smallInteger('verificado')->default('0');
            $table->smallInteger('confirmou_termos')->default('0');
            $table->string('capa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario');
    }
}
