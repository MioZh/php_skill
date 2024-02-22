<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required',
            'status' => 'required|in:unread,read',
        ]);

        Notification::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'Уведомление успешно создано');
    }

    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return view('notifications.show', compact('notification'));
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required',
            'status' => 'required|in:unread,read',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'Уведомление успешно обновлено');
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Уведомление успешно удалено');
    }
}
