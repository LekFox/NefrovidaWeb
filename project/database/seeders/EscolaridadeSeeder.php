<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

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
                "nombreEscolaridad" => "Analfabeta",
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
                "nombreEscolaridad" => "Preparatoria",
            ],
            [
                "id" => 5,
                "nombreEscolaridad" => "Universidad",
            ],
            [
                "id" => 6,
                "nombreEscolaridad" => "Maestría",
            ],
        ]);
    }
}
