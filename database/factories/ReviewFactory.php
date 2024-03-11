<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\ExchangeRequest;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'exchange_request_id' => ExhangeRequest::get()->random()->id,
            'reviewer_user_id' => User::get()->random()->id,
            'reviewee_user_id' => User::get()->random()->id,
            'rating' => rand(1, 10),
            'comment' => fake()->text(rand(5, 100)),
        ];
    }
}
