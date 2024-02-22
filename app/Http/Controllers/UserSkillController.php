<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSkill;

class UserSkillController extends Controller
{
    public function index()
    {
        $userSkills = UserSkill::all();
        return view('user_skills.index', compact('userSkills'));
    }

    public function create()
    {
        return view('user_skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,id',
            'level' => 'required|integer|min:1|max:5',
        ]);

        UserSkill::create($request->all());

        return redirect()->route('user_skills.index')->with('success', 'Навык пользователя успешно добавлен');
    }

    public function show($id)
    {
        $userSkill = UserSkill::findOrFail($id);
        return view('user_skills.show', compact('userSkill'));
    }

    public function edit($id)
    {
        $userSkill = UserSkill::findOrFail($id);
        return view('user_skills.edit', compact('userSkill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,id',
            'level' => 'required|integer|min:1|max:5',
        ]);

        $userSkill = UserSkill::findOrFail($id);
        $userSkill->update($request->all());

        return redirect()->route('user_skills.index')->with('success', 'Навык пользователя успешно обновлен');
    }

    public function destroy($id)
    {
        $userSkill = UserSkill::findOrFail($id);
        $userSkill->delete();

        return redirect()->route('user_skills.index')->with('success', 'Навык пользователя успешно удален');
    }
}
