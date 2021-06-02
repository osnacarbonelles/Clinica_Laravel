<?php

namespace Database\Factories;

use App\Models\Doctores;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "hospital_id" => 1,
            'nombres'           => $this->faker->firstName(),
            "apellidos"         => $this->faker->lastName(),
            "direccion"         => $this->faker->address(),
            "telefono"          => $this->faker->phoneNumber(),
            "experiencia"       => $this->faker->randomDigit(),
            "fecha_nacimiento"  => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            "tipo_sangre"       => "-" . strtoupper($this->faker->lexify('?')),
        ];
    }
}
