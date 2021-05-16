<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beneficiario;
use App\Models\Jornada;
use App\Models\Notas;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Beneficiario::factory(15)->create();
        Jornada::factory(15)->create();
        Notas::factory(30)->create();

        $this->call([
            //SIN LLAVES FORÁNEAS
            EscolaridadeSeeder::class,
            //USA LLAVES FORÁNEAS
        ]);
    }
}
