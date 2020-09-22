<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedienteUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Es raro pero en plural no funciona (expedientes_users) PERO
        // si pongo datos dentro de (expediente_user) singular si funciona
        Schema::create('expediente_user', function (Blueprint $table) {
            $table->unsignedInteger('expediente_id');
            $table->unsignedInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expediente_user');
    }
}
