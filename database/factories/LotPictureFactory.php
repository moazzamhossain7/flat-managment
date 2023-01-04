<?php

namespace Database\Factories;

use App\Models\Lot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class LotPictureFactory extends Factory
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
            'path' => "/assets/frontend/img/lots/". $this->faker->randomElement([11, 12, 13, 21, 22, 23, 24, 31, 32, 33, 34, 35]) . ".jpg",
            'details' => $this->faker->text(100),
        ];
    }
}
