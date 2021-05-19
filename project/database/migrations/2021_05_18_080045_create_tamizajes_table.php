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
            $table->integer('circunferenciaCintura');
            $table->integer('circunferenciaCadera');
            $table->integer('glucosaCapilar');
            $table->integer('talla');
            $table->float('peso', 8, 2);
            $table->float('indiceCinturaCadera', 8, 2)
                ->nullable();
            $table->string('comentario', 200);
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
