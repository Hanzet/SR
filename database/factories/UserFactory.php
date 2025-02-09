<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// Este Factory me permite crear usuarios de pruebas al azar

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [ // Se encarga de agregar datos fake o aleatorios
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'teléfono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'foto' => null,
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
