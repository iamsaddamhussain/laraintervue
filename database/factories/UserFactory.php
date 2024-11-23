<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => env('NAME', 'Super'),
            'email' => env('EMAIL', 'admin@mail.com'),
            'password' => bcrypt('secret'),
            'user_type' => 1 //super admin
        ];
    }
}
