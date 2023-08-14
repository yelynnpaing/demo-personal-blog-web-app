<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::paginate(7);
        return view('admin-panel.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ]);

        Skill::create([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);

      return redirect('admin/skills')->with('successMsg', 'You have successfully created this skill.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "I am show page";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::find($id);
        return view('admin-panel.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skill = Skill::find($id);
        $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ]);
        $skill->update([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);

        return redirect('admin/skills')->with('successMsg', 'You have successfully updated this skill.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();

        return redirect('admin/skills')->with('successMsg', 'You have successfully deleted this item. !');
    }
}
