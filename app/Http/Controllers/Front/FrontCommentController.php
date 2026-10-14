<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class FrontCommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $postId,
            'name' => trim($request->name),
            'email' => trim($request->email),
            'comment' => trim($request->comment),
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Your comment has been submitted and is awaiting approval.');
    }
}
