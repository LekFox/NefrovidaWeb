<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escolaridades')->insert([
            [
                "id" => 1,
                "nombreEscolaridad" => "Preparatoria",
            ],
            [
                "id" => 2,
                "nombreEscolaridad" => "Primaria",
            ],
            [
                "id" => 3,
                "nombreEscolaridad" => "Secundaria",
            ],
            [
                "id" => 4,
                "nombreEscolaridad" => "Universidad",
            ],
            [
                "id" => 5,
                "nombreEscolaridad" => "Maestría",
            ],
            [
                "id" => 6,
                "nombreEscolaridad" => "Analfabeta",
            ],
        ]);
    }
}
