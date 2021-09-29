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
            $table->id();
            //Los campos donde se van almacenar las foreign keys
            $table->unsignedBigInteger('roleId');
            $table->unsignedBigInteger('ciudadId');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('celular');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            //foreign keys
            $table->foreign('roleId')->references('id')->on('roles')
                    ->onUpdate('cascade');

            $table->foreign('ciudadId')->references('id')->on('ciudades')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->rememberToken();

            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
