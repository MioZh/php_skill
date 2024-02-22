<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно создан');
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all());

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно обновлен');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно удален');
    }
}
