<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'valor' => $this->faker->randomFloat(2, 500, 3000),
            'ativo' => $this->faker->boolean(),
            'inscricao_inicio' => $this->faker->date(),
            'inscricao_fim' => $this->faker->date(),
            'vagas_restantes' => $this->faker->numberBetween(0, 30),
        ];
    }
}
