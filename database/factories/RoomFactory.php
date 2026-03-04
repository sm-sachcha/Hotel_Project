<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;   // 🔥 VERY IMPORTANT

    public function definition(): array
    {
        return [
            'room_number' => fake()->numberBetween(100, 999),
            'type' => 'single',
            'price' => fake()->numberBetween(1000, 5000),
            'status' => 'available',
        ];
    }
}