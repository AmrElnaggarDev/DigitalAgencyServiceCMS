<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('id','asc')->get();
        return view('admin.photo.index', compact('photos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'photo_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $photo = new Photo();
        $photo->photo = $final_name;
        $photo->caption = $request->caption;
        $photo->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'photo_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($photo->photo && file_exists(public_path('uploads/'.$photo->photo))) {
                unlink(public_path('uploads/'.$photo->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $photo->photo = $final_name;
        }

        $photo->caption = $request->caption;
        $photo->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $photo = Photo::where('id', $id)->first();
        if($photo->photo && file_exists(public_path('uploads/'.$photo->photo))) {
            unlink(public_path('uploads/'.$photo->photo));
        }
        $photo->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
