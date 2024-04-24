<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Token; 
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Servises\EventService;
use App\Servises\SearchEventService;

class EventController extends Controller
{
    public function getAllEvents($token)
    {
        $user = Token::where('token', $token)->first();
        $events = new SearchEventService();
        $events = $events->all($user);


        return response()->json($events);
    }
    public function insertEvent(EventRequest $request, $token)
    {
        $token = Token::where('token', $token)->first();
        //return response()->json([$token->user_id]);
        $data = new EventService();
        $data = $data->create($request->toArray(), $token->user_id);
        
        // Возвращаем успешный ответ
        return response()->json(['message' => 'Событие успешно добавлено', "event"=> $data], 201);
    }
    
    public function searchEvents(Request $request, $token)
    {
        $user = Token::where('token', $token)->first();
        $events = new SearchEventService();
        $events = $events -> search($request, $user);
        return response()->json($events);
    }
}
