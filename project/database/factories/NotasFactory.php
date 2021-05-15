<?php

namespace Database\Factories;

use App\Models\Notas;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'tipoNota_id' => 1,
            'fecha' => $this->faker->date,
            'comentario' => $this->faker->text(),
            //'beneficiario_id' => request('beneficiario_id'),
            'tiponota' => 'General',
            'beneficiario_id' => \App\Models\Beneficiario::inRandomOrder()->first()->id,
        ];
    }
}
