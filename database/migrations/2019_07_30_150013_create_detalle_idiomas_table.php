<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_idiomas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idiomas_id');
            $table->foreign('idiomas_id')->references('id')->on('idiomas')->onDelete('cascade');;
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete('cascade');;
            $table->string('nivel_ingles',20)->nullable();
            $table->string('carga_certificado',300)->nullable();
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
        Schema::dropIfExists('detalle_idiomas');
    }
}
