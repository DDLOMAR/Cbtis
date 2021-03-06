<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->dateTime('fecha_n');
            $table->string('curp');
            $table->integer('horas');
            $table->string('estado_c');
            $table->integer('clave_en');
            $table->integer('clave_mn');
            $table->integer('clave_mv');
            $table->integer('clave_lv');
            $table->string('colonia');
            $table->string('calle');
            $table->integer('cp');
            $table->string('telefono_c');
            $table->string('celular');
            $table->timestamps();
        });

        Schema::create('ascesores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_id')->unsigned();
            $table->integer('profesor_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumno_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('profesor_id')->unsigned();
            $table->float('parcial1',2,2)->nullable();
            $table->float('parcial2',2,2)->nullable();
            $table->float('parcial3',2,2)->nullable();
            $table->float('promedio',2,2)->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
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
        Schema::dropIfExists('profesores');
    }
}
