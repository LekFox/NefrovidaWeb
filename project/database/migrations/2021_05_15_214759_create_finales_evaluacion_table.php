<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalesEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finales_evaluacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregunta_evaluacion_id');
            $table->integer('respuesta');
            $table->timestamps();
            

            $table->foreign('pregunta_evaluacion_id')->references('id')->on('preguntas_evaluacion')
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
        Schema::dropIfExists('finales_evaluacion');
    }
}
