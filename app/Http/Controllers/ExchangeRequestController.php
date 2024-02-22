<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExchangeRequest;

class ExchangeRequestController extends Controller
{
    public function index()
    {
        $exchangeRequests = ExchangeRequest::all();
        return view('exchange_requests.index', compact('exchangeRequests'));
    }

    public function create()
    {
        return view('exchange_requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender_user_id' => 'required|exists:users,id',
            'receiver_user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,id',
            'status' => 'required|in:pending,accepted,declined',
            'message' => 'nullable',
        ]);

        ExchangeRequest::create($request->all());

        return redirect()->route('exchange_requests.index')->with('success', 'Запрос на обмен навыками успешно создан');
    }

    public function show($id)
    {
        $exchangeRequest = ExchangeRequest::findOrFail($id);
        return view('exchange_requests.show', compact('exchangeRequest'));
    }

    public function edit($id)
    {
        $exchangeRequest = ExchangeRequest::findOrFail($id);
        return view('exchange_requests.edit', compact('exchangeRequest'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sender_user_id' => 'required|exists:users,id',
            'receiver_user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,id',
            'status' => 'required|in:pending,accepted,declined',
            'message' => 'nullable',
        ]);

        $exchangeRequest = ExchangeRequest::findOrFail($id);
        $exchangeRequest->update($request->all());

        return redirect()->route('exchange_requests.index')->with('success', 'Запрос на обмен навыками успешно обновлен');
    }

    public function destroy($id)
    {
        $exchangeRequest = ExchangeRequest::findOrFail($id);
        $exchangeRequest->delete();

        return redirect()->route('exchange_requests.index')->with('success', 'Запрос на обмен навыками успешно удален');
    }
}
