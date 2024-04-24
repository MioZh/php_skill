<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Models\Token; 
use App\Models\EventParticipant;
use App\Servises\EventParticipantService;
use App\Http\Requests\EventParticipantRequest;

class EventParticipantsController extends Controller
{
    protected $eventParticipantService;

    public function __construct(EventParticipantService $eventParticipantService)
    {
        $this->eventParticipantService = $eventParticipantService;
    }

    public function eventParticipant(EventParticipantRequest $request, $token)
    {
        $validatedData = $request->validated();
        $eventId = $validatedData['event_id'];

        $result = $this->eventParticipantService->registerParticipant($token, $eventId);

        if (isset($result['error'])) {
            return response()->json($result, 400);
        }

        return response()->json($result, 200);
    }
}
