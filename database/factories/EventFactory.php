<?php

namespace Database\Factories;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->text(10),
            'description' => fake()->text(20),
            'date_event' => Carbon::today()->subDays(rand(-1, -180)),
            'location' => fake()->text(10),
        ];
    }
}
