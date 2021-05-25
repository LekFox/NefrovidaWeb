<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutricionConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutricion_consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id')->nullable();
            $table->foreign("beneficiario_id")->references('id')->on('beneficiarios')->onDelete('set null');

            $table->string("ocupacion")->nullable();
            $table->string("horarioscomida")->nullable();
            $table->string("cantidadalimentos")->nullable();
            $table->string("apetito")->nullable();
            $table->string("distension")->nullable();
            $table->string("estrenimiento")->nullable();
            $table->string("flatulencias")->nullable();
            $table->string("vomitos")->nullable();
            $table->string("caries")->nullable();
            $table->string("edema")->nullable();
            $table->string("mareo")->nullable();
            $table->string("zumbido")->nullable();
            $table->string("cefaleas")->nullable();
            $table->string("disnea")->nullable();
            $table->string("poliuria")->nullable();
            $table->string("actividadfisica")->nullable();
            $table->string("suenohoras")->nullable();
            $table->string("comidasdia")->nullable();
            $table->string("lugarcomida")->nullable();
            $table->string("preparacomida")->nullable();
            $table->text("entrecomidas")->nullable();
            $table->text("alimentospreferidos")->nullable();
            $table->text("alimentosodiados")->nullable();
            $table->string("suplementos")->nullable();
            $table->string("medicamentos")->nullable();
            $table->string("consumoagua")->nullable();
            $table->text("recordatoriodesayuno")->nullable();
            $table->text("recordatoriocolacionm")->nullable();
            $table->text("recordatoriocomida")->nullable();
            $table->text("recordatoriocolaciont")->nullable();
            $table->text("recordatoriocena")->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->decimal('estatura', 5, 2)->nullable();
            $table->string("tipodieta")->nullable();
            // $table->decimal('kilocaloriastotal', 5, 2)->nullable();
            $table->string('kilocaloriastotal')->nullable();
            $table->decimal('kilocaloriashidratos', 5, 2)->nullable();
            $table->decimal('porcentajehidratos', 5, 2)->nullable();
            $table->decimal('porcentajeproteinas', 5, 2)->nullable();
            $table->decimal('porcentajegrasas', 5, 2)->nullable();
            $table->text("diagnostico")->nullable();
            $table->text("nota")->nullable();
            $table->string("imc")->nullable();
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
        Schema::dropIfExists('nutricion_consultas');
    }
}
