<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aluno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'turma' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'emprestimo_ativo' => $this->faker->boolean($chanceOfGettingTrue = 0)
        ];
    }
}
