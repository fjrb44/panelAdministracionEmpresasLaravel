<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();

            $table->integer('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')
                ->onUpdate("cascade")->onDelete("cascade");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
