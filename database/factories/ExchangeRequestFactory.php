<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Skill;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExchangeRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sender_user_id' => User::get()->random()->id,
            'receiver_user_id' => User::get()->random()->id,
            'skill_id' => Skill::get()->random()->id,
            'status' => fake()->text(20),
            'message' => fake()->text(20),
        ];
    }
}
