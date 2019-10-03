<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom',30);
            $table->string('ap',50);
            $table->string('am',50);
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_domicilio')->nullable();
            $table->string('carga_rfc',300)->nullable();
            $table->string('carga_curp',300)->nullable();
            $table->string('carga_ife',300)->nullable();
            $table->string('carga_domicilio',300)->nullable();


            $table->string('foto',300);
            $table->string('rfc',30)->nullable();
            $table->string('curp',30)->nullable();

            $table->string('calle',200)->nullable();
            $table->string('numero',50)->nullable();
            $table->string('correo_per',50)->nullable();
            $table->string('correo_ins',50)->nullable();
            $table->string('tel_casa',50)->nullable();
            $table->string('tel_movil',50)->nullable();



            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->unsignedBigInteger('paises_id');
            $table->foreign('paises_id')->references('id')->on('paises');

            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')->references('id')->on('estados')->nullable();

            $table->unsignedBigInteger('colonias_id');
            $table->foreign('colonias_id')->references('id')->on('colonias');

            $table->unsignedBigInteger('municipios_id');
            $table->foreign('municipios_id')->references('id')->on('municipios');

            $table->unsignedBigInteger('estado_civils_id');
            $table->foreign('estado_civils_id')->references('id')->on('estado_civils')->nullable();








            $table->boolean('condicion')->default(1);
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
        Schema::dropIfExists('usuarios');
    }
}
