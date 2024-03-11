<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SKill;
use App\Models\UserSkill;
use App\Models\Chat;
use App\Models\ChatSetting;
use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\ExchangeRequest;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Review;
use App\Models\Token;
use App\Models\UsersChat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Token::factory(20)->create();
        SKill::factory(10)->create();
        UserSkill::factory(20)->create();
        Chat::factory(20)->create();
        ChatSetting::factory(20)->create();
        Event::factory(20)->create();
        EventParticipant::factory(20)->create();
        //ExchangeRequest::factory(20)->create();
        Message::factory(20)->create();
        Notification::factory(20)->create();
        //Review::factory(20)->create();
        UsersChat::factory(20)->create();
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
