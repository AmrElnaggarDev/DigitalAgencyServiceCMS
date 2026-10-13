<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;

class AdminPostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('id','asc')->get();
        return view('admin.post_category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:post_categories,slug',
        ]);

        $category = new PostCategory();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $category = PostCategory::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:post_categories,slug,'.$category->id,
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $category = PostCategory::where('id', $id)->first();
        $category->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
