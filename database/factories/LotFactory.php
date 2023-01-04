<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class LotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner_id' => User::where('role', 'landlord')->get()->random()->id,
            'location_id' => Location::all()->random()->id,
            'name' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['apartment', 'duplex', 'apartment', 'building', 'villa']),
            'address' => $this->faker->address(),
            'description' => $this->faker->text(1000),
            'property_id' => $this->faker->numberBetween(100, 999) ."-". $this->faker->word(),
            'lot_area' => $this->faker->numberBetween(100, 2999),
            'home_area' => $this->faker->numberBetween(100, 2999),
            'rooms' => $this->faker->randomDigitNot(0),
            'beds' => $this->faker->randomDigitNot(0),
            'baths' => $this->faker->randomDigitNot(0),
            'built' => $this->faker->year(),
            'price' => $this->faker->randomFloat(2, 1000, 9999),
            'feature' => ["garage", "dining-area", "parking", "garden", "living-room", "gym-area"],
            'amenities' => ["ac", "gym", "microwave", "swimming-pool", "wifi", "barbeque", "recreation", "fridge", "court", "game", "fireplace", "washer", "security"],
            'lat' => '23.746466',
            'lang' => '90.376015',
            'status' => $this->faker->randomElement(['for rent', 'rented', 'for sale']),
        ];
    }
}
