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
            $table->unsignedBigInteger('beneficiario_id');
            $table->foreign("beneficiario_id")->references('id')->on('beneficiarios')->onDelete('cascade');
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('set null');
           
            $table->timestamps();
            $table->date("fecha");
            $table->string("comentario");
            $table->foreignId("tipo_nota_id")
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            // $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');

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
