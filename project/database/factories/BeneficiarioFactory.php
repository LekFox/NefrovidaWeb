<?php

namespace Database\Factories;

use App\Models\Beneficiario;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeneficiarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beneficiario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $gender = randomElement(['male', 'female']);
        // $status = randomElement(['Y', 'N']);
        // $seguimiento = randomElement(['Si', 'No']);

        return[
            'nombreBeneficiario' => $this->faker->name,
            'fechaNacimiento' => $this->faker->date,
            // 'sexo' => $this->$gender,
            'sexo' => 'H',
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'estatus' => 'Y',
            //'seguimiento' => 'Si',
            // 'status' => $this->$status,
            // 'seguimiento' => $this->$seguimiento,
        ];
    }
}
