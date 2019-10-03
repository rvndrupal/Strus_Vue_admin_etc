<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exp_laborales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete('cascade');;
            $table->string('den_puesto',60);
            $table->string('ins_puesto',60);
            $table->string('area_puesto',60);
            $table->string('anos_puesto',60);
            $table->date('fecha_ing_puesto')->nullable();
            $table->date('fecha_baj_puesto')->nullable();
            $table->string('doc_puesto',300);


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
        Schema::dropIfExists('exp_laborales');
    }
}
