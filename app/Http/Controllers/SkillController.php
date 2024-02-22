<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:skills',
            'description' => 'nullable',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')->with('success', 'Навык успешно создан');
    }

    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        return view('skills.show', compact('skill'));
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:skills,name,' . $id,
            'description' => 'nullable',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update($request->all());

        return redirect()->route('skills.index')->with('success', 'Навык успешно обновлен');
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Навык успешно удален');
    }
}
