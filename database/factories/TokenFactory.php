<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Token>
 */
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();

        // Возвращаем определение токена с user_id равным id созданного пользователя
        return [
            'token' => Str::random(16),
            'expires_at' => Carbon::now()->addYears(2),
            'user_id' => $user->id,
        ];
    }
}
