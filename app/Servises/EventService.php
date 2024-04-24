<?php

namespace App\Servises;
use App\Models\Event;

class EventService
{

    public function create($data, $user_id){
        // Добавляем ключ created_users и присваиваем ему значение $user_id
        $data['created_users'] = $user_id;
        
        // Создаем новый объект события
        $event = new Event();
        
        // Устанавливаем значения для полей события
        $event->create($data);
        
        return $event;
    }
}