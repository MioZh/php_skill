<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatSetting>
 */
class ChatSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $themes = ['day', 'classic', 'night'];
        return [
            'user_id' => User::get()->random()->id,
            'enable_sound_notifications' => rand(0,1),
            'theme' => collect($themes)->random(),
        ];
    }
}
