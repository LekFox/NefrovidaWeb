<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id')->nullable();
            $table->foreign("beneficiario_id")->references('id')->on('beneficiarios')->onDelete('set null');

            $table->string("padecimiento")->nullable();
            $table->string("TAbrazoDerecho")->nullable();
            $table->string("TAbrazoIzquierdo")->nullable();
            $table->string("frecuenciaCardiaca")->nullable();
            $table->string("frecuenciaRespiratoria")->nullable();
            $table->string("temperatura")->nullable();
            $table->string("peso")->nullable();
            $table->string("talla")->nullable();
            $table->string("cabezaCuello")->nullable();
            $table->string("torax")->nullable();
            $table->string("abdomen")->nullable();
            $table->string("extremidades")->nullable();
            $table->string("estadoMentalNeurologico")->nullable();
            $table->string("observaciones")->nullable();
            $table->string("diagnostico")->nullable();
            $table->string("tratamiento")->nullable();

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
        Schema::dropIfExists('consulta');
    }
}
