<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("beneficiario_id")
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('casa', ['propia', 'rentada', 'prestada']);
            $table->boolean('serviciosBasicos');
            $table->text('personalesPatologicos', 400)
                ->nullable()
                ->default("N/A");
            $table->text('personalesNoPatologicos', 400)
                ->nullable()
                ->default("N/A");
            $table->boolean('padreVivo');
            $table->text('enfermedadesPadre', 400)
                ->nullable()
                ->default("N/A");
            $table->boolean('madreVivo');
            $table->text('enfermedadesMadre', 400)
                ->nullable()
                ->default("N/A");
            $table->integer('numHermanos')
                ->nullable()
                ->default(0);
            $table->integer('numHermanosVivos')
                ->nullable()
                ->default(0);
            $table->text('enfermedadesHermanos', 400)
                ->nullable()
                ->default("N/A");
            $table->text('otrosHermanos', 400)
                ->nullable()
                ->default("N/A");
            $table->integer('menarquia')
                ->nullable();
            $table->integer('ritmo')
                ->nullable();
            $table->date("fum")
                ->nullable();
            $table->integer('gestaciones')
                ->nullable();
            $table->integer('partos')
                ->nullable();
            $table->integer('abortos')
                ->nullable();
            $table->integer('cesareas')
                ->nullable();
            $table->integer('ivsa')
                ->nullable();
            $table->text('metodosAnticonceptivos', 400)
                ->nullable()
                ->default("N/A");
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
        Schema::dropIfExists('antecedentes');
    }
}
