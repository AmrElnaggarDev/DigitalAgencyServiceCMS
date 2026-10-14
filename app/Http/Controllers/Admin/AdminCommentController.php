<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->orderBy('id', 'desc')->get();

        return view('admin.comment.index', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'Approved';
        $comment->save();

        return redirect()->back()->with('success', 'Comment approved successfully.');
    }

    public function reject($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'Rejected';
        $comment->save();

        return redirect()->back()->with('success', 'Comment rejected successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
