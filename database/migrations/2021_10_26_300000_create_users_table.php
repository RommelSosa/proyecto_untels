<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 60);
            $table->string('email', 50)->unique();
            $table->string('password', 60);
            $table->tinyInteger('role_as')->default('0');
            $table->tinyInteger('estado')->default('1');
            $table->string('estadocontrasena', 10)->default('null');
            $table->string('egresado_matricula', 10)->nullable();
            $table->integer('id_academico')->unsigned()->nullable();
            $table->foreign('id_academico')->references('id_academico')->on('academico')->onUpdate('cascade')->unique();
            $table->string('dni', 8)->nullable();
            $table->foreign('dni')->references('dni')->on('egresado')->onDelete('cascade')->onUpdate('cascade')->unique();
            $table->string('api_token')->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->string('url')->nullable();
            $table->string('email_personal', 50)->unique()->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
