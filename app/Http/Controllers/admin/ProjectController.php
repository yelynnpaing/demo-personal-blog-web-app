<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);
        return view('admin-panel.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $image = $request->image;
        $imageName = uniqid().'_'. $image->getClientOriginalName();
        $image->storeAs('public/project-images', $imageName);
        Project::create([
            'name' => $request->name,
            'url' => $request->url,
            'image' => $imageName,
        ]);
        return redirect()->route('projects.index')->with('successMsg', 'You have Successfully created a new project.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('admin-panel.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);
        $project = Project::find($id);
        if($request->hasfile('image')){
            $projectImg = $project->image;
            File::delete('storage/project-images/'.$projectImg);

            $image = $request->image;
            $imageName = uniqid().'_'.$image->getClientOriginalName();
            $image->storeAs('public/project-images/', $imageName);
            $data['image'] = $imageName;
        }
        $project->update($data);

        return redirect('admin/projects')->with('successMsg', 'You have successfully updated this project.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect('admin/projects')->with('successMsg','You have successfully deleted this project');
    }
}
