<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Event;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventParticipant>
 */
class EventParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'event_id' => Event::get()->random()->id,
        ];
    }
}
