<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'login' => $this->faker->unique()->userName,
            'password' => Hash::make('password'),
            'is_admin' => false,
            'remember_token' => Str::random(10),
        ];
    }
}
