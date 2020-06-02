<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('user_id')->unsigned()->nullable();
            $table->string('numExpediente', 130);
            $table->integer('folio');
            $table->integer('materia_id')->unsigned();
            $table->integer('juzgado_id')->unsigned();
            $table->string('especialistaLegal', 100);
            $table->string('demandante', 100);
            $table->string('demandado', 100);
            $table->string('destinatario', 100);
            $table->string('direccion', 100);
            $table->date('fechaApertura');
            $table->integer('proceso_id')->unsigned();
            $table->string('acto', 100);
            $table->date('fechaAudiencia');
            $table->boolean('condition')->nullable()->default(0);
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
        Schema::dropIfExists('expedientes');
    }
}
