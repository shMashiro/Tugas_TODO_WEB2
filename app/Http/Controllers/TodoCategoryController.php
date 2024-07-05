<?php

namespace App\Http\Controllers;

use App\Models\TodoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoCategoryController extends Controller
{
    public function index()
    {
        // Hanya menampilkan kategori milik user yang sedang login
        $categories = TodoCategory::where('user_id', Auth::id())->get();
        return view('todocategory.index', compact('categories'));
    }

    public function create()
    {
        return view('todocategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:todo_categories,category,NULL,id,user_id,' . Auth::id(),
        ]);

        TodoCategory::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
        ]);

        return redirect()->route('todocategory.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $category = TodoCategory::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('todocategory.edit', compact('category'));
    }

    public function destroy($id)
    {
        $category = TodoCategory::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $category->delete();
        return redirect()->route('todocategory.index')->with('success', 'Kategori berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:todo_categories,category,' . $id . ',id,user_id,' . Auth::id(),
        ]);

        $category = TodoCategory::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $category->update([
            'category' => $request->category,
        ]);

        return redirect()->route('todocategory.index')->with('success', 'Kategori berhasil diupdate!');
    }
}
