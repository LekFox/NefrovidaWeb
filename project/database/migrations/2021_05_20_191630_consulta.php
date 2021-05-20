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
            $table->foreignId("beneficiario_id")
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('padecimiento', 400)
                ->nullable();
            $table->text('brazoD', 50)
                ->nullable();
            $table->text('brazoI', 50)
                ->nullable();
            $table->text('fCardiaca', 50)
                ->nullable();
            $table->text('fRespiratoria', 50)
                ->nullable();
            $table->text('temperatura', 50)
                ->nullable();
            $table->text('peso', 50)
                ->nullable();
            $table->text('talla', 50)
                ->nullable();
            $table->text('cabezaCuello', 50)
                ->nullable();
            $table->text('torax', 50)
                ->nullable();
            $table->text('abdomen', 50)
                ->nullable();
            $table->text('extremidades', 50)
                ->nullable();
            $table->text('mental', 50)
                ->nullable();
            $table->text('observaciones', 400)
                ->nullable();
            $table->text('diagnostico', 400)
                ->nullable();
            $table->text('tratamiento', 400)
                ->nullable();
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
