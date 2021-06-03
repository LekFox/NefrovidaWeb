<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "id" => 1,
                "name" => "espino",
                "rol" => "administrador",
                "email" => "test@gmail.com",
                "password" => "12345678",
            ],
            [
                "id" => 2,
                "name" => "medico",
                "rol" => "medico",
                "email" => "med@gmail.com",
                "password" => "12345678",
            ],
            
        ]);
    }
}
