<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','asc')->get();
        $categories = PostCategory::orderBy('name','asc')->get();
        return view('admin.post.index', compact('posts', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_category_id' => 'required',
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:posts,slug',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'post_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $post = new Post();
        $post->post_category_id = $request->post_category_id;
        $post->photo = $final_name;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        $request->validate([
            'post_category_id' => 'required',
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:posts,slug,'.$post->id,
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'post_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($post->photo && file_exists(public_path('uploads/'.$post->photo))) {
                unlink(public_path('uploads/'.$post->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $post->photo = $final_name;
        }

        $post->post_category_id = $request->post_category_id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        if($post->photo && file_exists(public_path('uploads/'.$post->photo))) {
            unlink(public_path('uploads/'.$post->photo));
        }
        $post->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
