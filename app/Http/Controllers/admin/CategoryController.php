<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(7);
        return view('admin-panel.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index')->with('successMsg',
        'You have Successfully created new category.');
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
        $category = Category::find($id);
        return view('admin-panel.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->validate($request, array(
        //     'name' => 'required|name|unique:categories,name,'
        // ));
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
        ]);

        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index')->with('successMsg',
        'You have successfully updated this category name.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('successMsg',
        'You have successfully deleted this category name.');
    }
}
