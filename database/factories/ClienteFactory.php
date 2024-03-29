<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->firstName,
            'sobrenome' => $this->faker->lastName,
            'user' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'site' => $this->faker->url,
            'imagem' => $this->faker->imageUrl(),
            'password' => Hash::make('123456'),
            'status' => $this->faker->randomElement([1, 0]),
        ];
    }
}
