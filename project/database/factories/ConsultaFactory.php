<?php

namespace Database\Factories;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consulta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->date,
            'comentario' => $this->faker->text(),

            'padecimiento'=> $this->faker->text(),
            'TAbrazoDerecho'=> $this->faker->text(),
            'TAbrazoIzquierdo'=> $this->faker->text(),
            'frecuenciaCardiaca'=> $this->faker->text(),
            'frecuenciaRespiratoria'=> $this->faker->text(),
            'temperatura'=> $this->faker->text(),
            'peso'=> $this->faker->text(),
            'talla'=> $this->faker->text(),
            'cabezaCuello'=> $this->faker->text(),
            'torax'=> $this->faker->text(),
            'abdomen'=> $this->faker->text(),
            'extremidades'=> $this->faker->text(),
            'estadoMentalNeurologico'=> $this->faker->text(),
            'observaciones'=> $this->faker->text(),
            'diagnostico'=> $this->faker->text(),
            'tratamiento'=> $this->faker->text(),
            

            'beneficiario_id' => \App\Models\Beneficiario::inRandomOrder()->first()->id,
        ];
    }
}
