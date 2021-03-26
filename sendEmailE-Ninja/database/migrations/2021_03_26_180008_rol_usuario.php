<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolUsuario',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->foreignId('rol_id')->constrained('rol');
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
        Schema::dropIfExists('rolUsuario');
    }
}
