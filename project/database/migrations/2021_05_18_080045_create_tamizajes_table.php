<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamizajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamizajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("beneficiario_id")
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('sistolica');
            $table->integer('diastolica');
            $table->integer('circunferenciaCintura')
                ->nullable();
            $table->integer('circunferenciaCadera')
                ->nullable();
            $table->integer('glucosaCapilar')
                ->nullable();
            $table->integer('talla');
            $table->float('peso', 8, 2);
            $table->float('imc', 10, 4);
            $table->float('indiceCinturaCadera', 8, 2)
                ->nullable();
            $table->string('comentario', 200)
                ->nullable();
            $table->string('dx', 200)
                ->nullable();
            $table->string('dxpresion', 200)
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
        Schema::dropIfExists('tamizajes');
    }
}
