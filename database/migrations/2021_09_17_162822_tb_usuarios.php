<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',120);
            $table->string('documento',20)->unique();
            $table->string('password',250);
            $table->char('genero',2);
            $table->date('fecha_nacimiento');
            $table->string('telefono',20);
            $table->integer('eps_id');
            $table->integer('rol_id');
            $table->integer('estado');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            
            $table->rememberToken();
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
        //
        Schema::dropIfExists('tb_usuarios');
    }
}
