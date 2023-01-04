<?php

namespace Database\Factories;

use App\Models\Lot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lot_id' => Lot::all()->random()->id,
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'avatar' => "/assets/frontend/img/users/". $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]) . ".jpg",
            'comments' => $this->faker->text(250),
            'rattings' => $this->faker->numberBetween(3, 5),
        ];
    }
}
