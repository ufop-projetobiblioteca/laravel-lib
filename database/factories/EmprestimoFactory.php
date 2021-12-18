<?php

namespace Database\Factories;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmprestimoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Emprestimo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'aluno_id' => Aluno::factory(),
            'livro_id' => Livro::factory(),
            'renovado' => $this->faker->boolean($chanceOfGettingTrue = 0),
            'ativo' => $this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
