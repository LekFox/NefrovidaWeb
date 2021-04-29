<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("beneficiario_id")
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->foreignId("tipo_nota_id")
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->timestamps();
            $table->date("fecha");
            $table->string("comentario");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
