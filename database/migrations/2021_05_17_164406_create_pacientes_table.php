<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nombres");
            $table->string("apellidos");
            $table->string("direccion");
            $table->string("EPS");
            $table->string("nombres_acomp");
            $table->string("apellidos_acomp");
            $table->string("telefono_acomp");
            $table->string("antecedentes")->nullable();
            $table->string("motivo_consulta");
            $table->string("diagnostico");
            $table->unsignedBigInteger("doctor_id");
            $table->foreign("doctor_id")->references("id")->on("doctores");
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
        Schema::dropIfExists('pacientes');
    }
}
