<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependientesCasadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependientes_casados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_dep',50)->default('0');
            $table->string('ap_dep',50)->default('0');
            $table->string('am_dep',50)->default('0');
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete('cascade');;
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
        Schema::dropIfExists('dependientes_casados');
    }
}
