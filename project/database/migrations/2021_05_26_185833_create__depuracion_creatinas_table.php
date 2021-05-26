<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepuracionCreatinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depuracion_creatininas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("beneficiario_id")
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('talla', 8, 2)
                ->nullable();
            $table->float('peso', 8, 2)
                ->nullable();
            $table->float('volumen', 8, 2)
                ->nullable();
            $table->float('superficieCorporal', 8, 2)
                ->nullable();
            $table->float('creatininaSuero', 8, 2)
                ->nullable();
            $table->float('creatininaDepuracion', 8, 2)
                ->nullable();
            $table->text('nota', 400)
                ->nullable();
            $table->string('metodo', 200)
                ->nullable();
            $table->string('observaciones', 200)
                ->nullable();
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
        Schema::dropIfExists('_depuracion_creatinas');
    }
}
