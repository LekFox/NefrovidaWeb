<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_finals', function (Blueprint $table) {
            $table->id();
            $table->integer('pregunta_id');
            $table->foreignId('beneficiario_id');
            $table->float('respuesta');
            $table->string('sexo');
            $table->string('edad');
            $table->string('grado');
            $table->string('grupo');
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
        Schema::dropIfExists('evaluacion_finals');
    }
}
