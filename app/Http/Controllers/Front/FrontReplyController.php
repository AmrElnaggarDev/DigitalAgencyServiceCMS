<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class FrontReplyController extends Controller
{
    public function store(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'reply' => 'required|string',
        ]);

        Reply::create([
            'post_id' => $comment->post_id,
            'comment_id' => $comment->id,
            'name' => trim($request->name),
            'email' => trim($request->email ?? ''),
            'reply' => trim($request->reply),
            'person_type' => 'Visitor',
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Your reply has been submitted and is awaiting approval.');
    }
}
