<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete('cascade');;
            $table->string('num_seg',60);
            $table->string('enf_seg',5);
            $table->string('cual_enf_seg',300)->nullable();
            $table->string('tipo_seg',60);

            $table->string('dis_seg',5);
            $table->string('cual_dis_seg',300)->nullable();
            $table->string('nom_seg',60);
            $table->string('pri_seg',60);
            $table->string('seg_seg',60);
            $table->string('par_seg',60);
            $table->string('email_seg',60);
            $table->string('tel_seg',60);
            $table->string('mov_seg',60);


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
        Schema::dropIfExists('seguros');
    }
}
