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
            //Resto de campos pendientes
            $table->string("nombreBeneficiario", 140);
            $table->date("fechaNacimiento");
            $table->string("sexo", 10);
            $table->string("telefono", 15);
            $table->string("direccion", 200);
            
            $table->string("estatus", 50);
            $table->boolean('seguimiento')->default(1);
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
