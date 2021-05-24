<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class consultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id')->nullable();
            $table->foreign("beneficiario_id")->references('id')->on('beneficiarios')->onDelete('set null');

            $table->text("padecimiento")->nullable();
            $table->string("brazoD")->nullable();
            $table->string("brazoI")->nullable();
            $table->string("fCardiaca")->nullable();
            $table->string("fRespiratoria")->nullable();
            $table->string("temperatura")->nullable();
            $table->string("peso")->nullable();
            $table->string("talla")->nullable();
            $table->string("cabeza")->nullable();
            $table->string("torax")->nullable();
            $table->string("abdomen")->nullable();
            $table->string("extremidades")->nullable();
            $table->text("mental")->nullable();
            $table->text("observaciones")->nullable();
            $table->text("diagnostico")->nullable();
            $table->text("tratamiento")->nullable();

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
        Schema::dropIfExists('consultas');
    }
}
