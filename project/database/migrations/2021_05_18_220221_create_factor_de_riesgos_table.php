<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorDeRiesgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factor_de_riesgos', function (Blueprint $table) {
            $table->id();
            $table->integer('pregunta_id');
            $table->foreignId('beneficiario_id');
            $table->integer('respuesta');
            $table->text('enfermedad')->nullable();
            $table->timestamps();

            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')
            ->onDelete('cascade')
            ->onUpdate('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factor_de_riesgos');
    }
}
