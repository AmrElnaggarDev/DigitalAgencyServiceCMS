<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;

class AdminReplyController extends Controller
{
    public function index()
    {
        $replies = Reply::with('comment')->orderBy('id', 'desc')->get();

        return view('admin.reply.index', compact('replies'));
    }

    public function approve($id)
    {
        $reply = Reply::findOrFail($id);
        $reply->status = 'Approved';
        $reply->save();

        return redirect()->back()->with('success', 'Reply approved successfully.');
    }

    public function reject($id)
    {
        $reply = Reply::findOrFail($id);
        $reply->status = 'Rejected';
        $reply->save();

        return redirect()->back()->with('success', 'Reply rejected successfully.');
    }

    public function destroy($id)
    {
        $reply = Reply::findOrFail($id);
        $reply->delete();

        return redirect()->back()->with('success', 'Reply deleted successfully.');
    }

    public function storeFromAdmin(Request $request, $commentId)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        Reply::create([
            'post_id' => $request->post_id,
            'comment_id' => $commentId,
            'name' => 'Admin',
            'email' => null,
            'reply' => trim($request->reply),
            'person_type' => 'Admin',
            'status' => 'Approved',
        ]);

        return redirect()->back()->with('success', 'Admin reply added successfully.');
    }
}
