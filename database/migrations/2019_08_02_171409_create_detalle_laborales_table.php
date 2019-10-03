<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_laborales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('puesto_actual',60)->nullable();
            $table->string('codigo_puesto',60)->nullable();
            $table->string('grado_nivel',60)->nullable();


            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
            $table->unsignedBigInteger('direcciones_generales_id');
            $table->foreign('direcciones_generales_id')->references('id')->on('direcciones_generales')->onDelete('cascade');;
            $table->unsignedBigInteger('direcciones_areas_id');
            $table->foreign('direcciones_areas_id')->references('id')->on('direcciones_areas')->onDelete('cascade');;
            $table->date('fecha_ultimo')->nullable();
            $table->date('fecha_senasica')->nullable();
            $table->string('calle_lab')->nullable();
            $table->string('num_lab')->nullable();
            $table->string('col_lab',60)->nullable();
            $table->string('mun_lab',60)->nullable();
            $table->string('est_lab',60)->nullable();
            $table->string('cod_lab',60)->nullable();
            $table->date('fecha_gobierno')->nullable();


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
        Schema::dropIfExists('detalle_laborales');
    }
}
