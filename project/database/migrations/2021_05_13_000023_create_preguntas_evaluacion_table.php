<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_evaluacion', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('orden');
            $table->foreignId('evaluacion_id');
            $table->timestamps();

            $table->foreign('evaluacion_id')->references('id')->on('evaluaciones')
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
        Schema::dropIfExists('preguntas_evaluacion');
    }
}
