<?php

namespace Database\Factories;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\HotelRoomOption;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $name = fake()->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => fake()->paragraph,
            'content' => fake()->text,
            'is_feature' => fake()->randomElement([0, 1]),
            'author_id' => fake()->randomElement([1, 2]),
            'state' => fake()->randomElement(['pending', 'approved']),
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657325699141!2d105.78236867602025!3d21.046392987171316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2sElectric%20Power%20University!5e0!3m2!1sen!2s!4v1705291858000!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'address' => fake()->address,
            'price' => fake()->numberBetween(100000, 5000000),
            'checkin_time' => fake()->time('Y-m-d'),
            'checkout_time' => fake()->time('Y-m-d'),
            'location_id' => fake()->randomElement([1, 20, 32, 50, 59, 24, 9, 25]),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Hotel $hotel) {
            // ...
        })->afterCreating(function (Hotel $hotel) {
            $hotel->facilities()->attach(Facility::all()->random());
            $hotel->services()->attach(Service::all()->random());

            // Create images for the hotel
            $imagePaths = [];
            $imageDirectory = 'image/hotels'.'/'.$hotel->id;

            if (!Storage::disk('public')->exists($imageDirectory)) {
                Storage::disk('public')->makeDirectory($imageDirectory, 0755, true);
            }

            // Generate 6 images for the hotel
            for ($i = 1; $i <= 3; $i++) {
                $imageName = "pro-$i.png";
                $path = Storage::disk('public')->putFileAs($imageDirectory, public_path("img/products/$imageName"), $imageName);
                $imagePaths[] = $path;
            }

            $hotel->update([
                'image' => $imagePaths,
            ]);

            // Create hotel room and options
            $hotelRoom = HotelRoom::updateOrCreate([
                'hotel_id' => $hotel->id,
            ], [
                'name' => 'Standard Room', // Set a default name or use a faker to generate one
                'price' => 100000, // Set a default price or use faker to generate one
            ]);

            HotelRoomOption::updateOrCreate([
                'hotel_room_id' => $hotelRoom->id,
            ], [
                'name' => 'Basic Option',
            ]);
        });
    }
}
