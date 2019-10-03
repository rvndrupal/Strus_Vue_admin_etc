<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConyugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conyuges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres_coy',80);
            $table->string('primero_coy',80);
            $table->string('segundo_coy',80);
            $table->string('curp_coy',80);
            $table->string('carga_curp_coy',300);
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('conyuges');
    }
}
