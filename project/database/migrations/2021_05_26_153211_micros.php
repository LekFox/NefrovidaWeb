<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Micros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id')->nullable();
            $table->foreign("beneficiario_id")->references('id')->on('beneficiarios')->onDelete('set null');

            $table->date("fecha")->nullable();
            $table->decimal('microalbumina', 5, 2)->nullable();
            $table->decimal('creatinina', 5, 2)->nullable();
            $table->string("microalbuminaCreatinina")->nullable();
            $table->string('metodo', 200)->nullable();
            $table->string('nota', 500)->nullable();

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
        Schema::dropIfExists('micros');
    }
}