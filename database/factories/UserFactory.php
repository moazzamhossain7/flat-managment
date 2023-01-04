<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'profession' => $this->faker->jobTitle(),
            'about' => $this->faker->text(300),
            'status' => true,
            // 'role' => $this->faker->randomElement(['landlord', 'tenant']),
            'role' => 'tenant',
            'avatar' => "/assets/frontend/img/users/". $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]) . ".jpg",
            'social_links' => [
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
            ],
        ];
    }
}
