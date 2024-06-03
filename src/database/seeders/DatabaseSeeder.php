<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'type' => 'Admin',
            'atived' => true,
        ]);

        $users = User::factory(10)->create();

        $courses = Course::factory(10)->create();

        foreach ($courses as $course) {
            $course->users()->attach(
                $users->random(rand(1, 5))->pluck('id')->toArray(),
                [
                    'data_inscricao' => now(),
                    'valor_pago' => rand(100, 500),
                    'status' => 'Pago',
                ]
            );
        }
    }
}
