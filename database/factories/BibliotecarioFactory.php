<?php

namespace Database\Factories;

use App\Models\Bibliotecario;
use Illuminate\Database\Eloquent\Factories\Factory;

class BibliotecarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bibliotecario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'matricula' => $this->faker->randomNumber(),
            'escola' => $this->faker->company(),
        ];
    }
}
