<?php

namespace Database\Factories;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->isbn10(),
            'titulo' => $this->faker->sentence(3, true),
            'autor' => $this->faker->name(),
            'edicao' => $this->faker->randomNumber(),
            'ano' => $this->faker->randomNumber(),
            'estante' => $this->faker->randomNumber(),
            'prateleira' => $this->faker->randomNumber(),
            'emprestado' => $this->faker->boolean($chanceOfGettingTrue = 0),
        ];
    }
}
