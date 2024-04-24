<?php

namespace App\Servises;
use App\Models\Event;

class SearchEventService
{
    public function search($request, $user){
        $query = Event::where('registered_users', '<', \DB::raw('places'))
                        ->where('created_users', '!=', $user->id)
                        ->where(function ($query) use ($request) {
                          $query->orwhere('id', 'like', '%' . $request->input('text') . '%')
                                ->orWhere('name', 'like', '%' . $request->input('text') . '%')
                                ->orWhere('location', 'like', '%' . $request->input('text') . '%')
                                ->orWhere('description', 'like', '%' . $request->input('text') . '%')
                                ->orWhere('date_event', 'like', '%' . $request->input('text') . '%');
                        });

        $events = $query->get();
        return $events;
    }

    public function all($user){
        $events = Event::where('registered_users', '<', \DB::raw('places'))
                       ->where('created_users', '!=', $user->id)
                       ->orderBy('registered_users', 'desc')
                       ->get();
        return $events;
    }
}