<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('todos')
            ->where('user_id', auth()->id())
            ->get();

        return view('category.index', compact('categories'));
    }


    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    Category::create([
        'title' => $request->title,
        'user_id' => auth()->id(), // pastikan user login
    ]);

    return redirect()->route('category.index')->with('success', 'Category created!');
    }

    public function edit(Category $category)
    {
        // Cek apakah category milik user yang login
        if ($category->user_id !== auth()->id()) {
            abort(403); // Forbidden
        }

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
