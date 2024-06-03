<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'user_id' => User::factory(),
            'data_inscricao' => $this->faker->date(),
            'valor_pago' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['Pago', 'Cancelado', 'Aguardando pagamento']),
        ];
    }
}
