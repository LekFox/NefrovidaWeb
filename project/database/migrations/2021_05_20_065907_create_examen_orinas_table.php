<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenOrinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_orinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("beneficiario_id")
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('color', 200)
                ->nullable();
            $table->string('aspecto', 200)
                ->nullable();
            $table->float('ph', 8, 2)
                ->nullable();
            $table->float('densidad', 8, 2)
                ->nullable();
            $table->string('nitritos', 200)
                ->nullable();
            $table->string('glucosa', 200)
                ->nullable();
            $table->string('proteinas', 200)
                ->nullable();
            $table->string('hemoglobina', 200)
                ->nullable();
            $table->string('cuerposCetonicos', 200)
                ->nullable();
            $table->string('bilirribuna', 200)
                ->nullable();
            $table->string('urobilinogeno', 200)
                ->nullable();
            $table->string('leucocitos', 200)
                ->nullable();
            $table->string('eritrocitosIntactos', 200)
                ->nullable();
            $table->string('eritrocitosCrenados', 200)
                ->nullable();
            $table->string('observacionLeucocitos', 200)
                ->nullable();
            $table->string('cristales', 200)
                ->nullable();
            $table->string('cilindros', 200)
                ->nullable();
            $table->string('celulasEpiteliales', 200)
                ->nullable();
            $table->string('bacterias', 200)
                ->nullable();
            $table->text('nota', 400)
                ->nullable();
            $table->string('metodo', 200)
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
        Schema::dropIfExists('examen_orinas');
    }
}
