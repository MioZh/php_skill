<?php

namespace App\Servises;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Token;


class EventParticipantService
{
    public function registerParticipant($token, $eventId)
    {
        $user = Token::where('token', $token)->first();
        $event = Event::find($eventId);

        if (($event->created_users) == ($user->id)) {
            return ['error' => 'Пользователь не может регистрироваться на свои событие'];
        }

        $existingParticipant = EventParticipant::where('user_id', $user->id)
            ->where('event_id', $eventId)
            ->first();

        if ($existingParticipant) {
            return ['error' => 'Пользователь уже зарегистрирован на это событие'];
        }

        $participant = new EventParticipant();
        $participant->user_id = $user->id;
        $participant->event_id = $eventId;
        $participant->save();

        $event->registered_users += 1;
        $event->save();

        return ['message' => 'Пользователь успешно зарегистрирован на событие'];
    }
}