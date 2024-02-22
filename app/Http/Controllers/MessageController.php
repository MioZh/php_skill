<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'chat_id' => 'required|exists:chats,id',
            'content' => 'required',
        ]);

        Message::create($request->all());

        return redirect()->route('messages.index')->with('success', 'Сообщение успешно создано');
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'chat_id' => 'required|exists:chats,id',
            'content' => 'required',
        ]);

        $message = Message::findOrFail($id);
        $message->update($request->all());

        return redirect()->route('messages.index')->with('success', 'Сообщение успешно обновлено');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Сообщение успешно удалено');
    }
}
