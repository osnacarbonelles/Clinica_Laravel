<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nombres");
            $table->string("apellidos");
            $table->string("direccion");
            $table->string("telefono");
            $table->string("tipo_sangre");
            $table->integer("experiencia");
            $table->date("fecha_nacimiento");
            $table->unsignedBigInteger("hospital_id");
            $table->foreign("hospital_id")->references("id")->on("hospitals");
            $table->integer("estado")->default(1);
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
        Schema::dropIfExists('doctores');
    }
}
