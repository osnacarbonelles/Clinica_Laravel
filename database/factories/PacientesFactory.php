<?php

namespace Database\Factories;

use App\Models\Pacientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pacientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "doctor_id" => 5,
            "nombres"               => $this->faker->firstName(),
            "apellidos"             => $this->faker->lastName(),
            "direccion"             => $this->faker->address(),
            "eps"                   => 'SURA',
            "nombres_acomp"         => $this->faker->firstName(),
            "apellidos_acomp"       => $this->faker->lastName(),
            "telefono_acomp"        => $this->faker->phoneNumber(),
            "antecedentes"           => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            "diagnostico"           => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            "motivo_consulta"       => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
