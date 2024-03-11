<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Chat;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsersChat>
 */
class UsersChatFactory extends Factory
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
            'chat_id' => Chat::get()->random()->id,
        ];
    }
}
