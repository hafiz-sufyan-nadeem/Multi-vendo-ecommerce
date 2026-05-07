<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin'){
            abort(403);
        }
        return view('categories.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin'){
            abort(403);
        }
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|max:2048',
        ]);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('categories', 'public');

            $validated['image'] = $imagePath;
        }
        Category::create($validated);
        return redirect('/categories');
    }

    public function edit($id)
    {
        if (auth()->user()->role !== 'admin'){
            abort(403);
        }
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin'){
            abort(403);
        }
        $category = Category::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);
        $category->update($validated);
        return redirect('/categories');
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin'){
            abort(403);
        }
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories');
    }
}
