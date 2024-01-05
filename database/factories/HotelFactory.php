<?php

namespace Database\Factories;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Hotel::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'description' => fake()->paragraph,
            'content' => fake()->text,
            'is_feature' => fake()->randomElement([0, 1]),
            'author_id' => fake()->randomElement([1, 2]),
            'state' => fake()->randomElement(['pending', 'approved']),
            'map' => fake()->latitude.','.fake()->longitude,
            'address' => fake()->address,
            'price' => fake()->numberBetween(100000, 10000000),
            'checkin_time' => fake()->time('Y-m-d'),
            'checkout_time' => fake()->time('Y-m-d'),
            'location_id' => fake()->numberBetween(1, 24),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Hotel $hotel) {
            // ...
        })->afterCreating(function (Hotel $hotel) {
            $hotel->types()->attach(Type::all()->random());
            $hotel->facilities()->attach(Facility::all()->random());
            $hotel->services()->attach(Service::all()->random());
        });
    }
}
