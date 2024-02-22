<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersChat;

class UsersChatsController extends Controller
{
    public function index()
    {
        $usersChats = UsersChat::all();
        return view('users_chats.index', compact('usersChats'));
    }

    public function create()
    {
        return view('users_chats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'chat_id' => 'required|exists:chats,id',
            'status' => 'required|in:active,inactive',
        ]);

        UsersChat::create($request->all());

        return redirect()->route('users_chats.index')->with('success', 'Связь пользователя с чатом успешно создана');
    }

    public function show($id)
    {
        $usersChat = UsersChat::findOrFail($id);
        return view('users_chats.show', compact('usersChat'));
    }

    public function edit($id)
    {
        $usersChat = UsersChat::findOrFail($id);
        return view('users_chats.edit', compact('usersChat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'chat_id' => 'required|exists:chats,id',
            'status' => 'required|in:active,inactive',
        ]);

        $usersChat = UsersChat::findOrFail($id);
        $usersChat->update($request->all());

        return redirect()->route('users_chats.index')->with('success', 'Связь пользователя с чатом успешно обновлена');
    }

    public function destroy($id)
    {
        $usersChat = UsersChat::findOrFail($id);
        $usersChat->delete();

        return redirect()->route('users_chats.index')->with('success', 'Связь пользователя с чатом успешно удалена');
    }
}
