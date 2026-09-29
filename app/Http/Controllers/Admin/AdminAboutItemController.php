<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use Illuminate\Http\Request;

class AdminAboutItemController extends Controller
{
    public function index()
    {
        $about_item = AboutItem::where ('id', 1)->first();
        return view('admin.about-item.index', compact('about_item'));
    }

    public function update(Request $request)
    {
        $about_item = AboutItem::where('id',1)->first();

        if($request->hasFile('photo1')) {
            $request->validate([
                'photo1' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'about_item_photo1_'.time().'.'.$request->photo1->getClientOriginalExtension();
            if($about_item->photo1 && file_exists(public_path('uploads/'.$about_item->photo1))) {
                unlink(public_path('uploads/'.$about_item->photo1));
            }
            $request->photo1->move(public_path('uploads/'), $final_name);
            $about_item->photo1 = $final_name;
        }

        if($request->hasFile('photo2')) {
            $request->validate([
                'photo2' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'about_item_photo2_'.time().'.'.$request->photo2->getClientOriginalExtension();
            if($about_item->photo2 && file_exists(public_path('uploads/'.$about_item->photo2))) {
                unlink(public_path('uploads/'.$about_item->photo2));
            }
            $request->photo2->move(public_path('uploads/'), $final_name);
            $about_item->photo2 = $final_name;
        }

        if($request->hasFile('photo3')) {
            $request->validate([
                'photo3' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'about_item_photo3_'.time().'.'.$request->photo3->getClientOriginalExtension();
            if($about_item->photo3 && file_exists(public_path('uploads/'.$about_item->photo3))) {
                unlink(public_path('uploads/'.$about_item->photo3));
            }
            $request->photo3->move(public_path('uploads/'), $final_name);
            $about_item->photo3 = $final_name;
        }

        if($request->hasFile('photo4')) {
            $request->validate([
                'photo4' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'about_item_photo4_'.time().'.'.$request->photo4->getClientOriginalExtension();
            if($about_item->photo4 && file_exists(public_path('uploads/'.$about_item->photo4))) {
                unlink(public_path('uploads/'.$about_item->photo4));
            }
            $request->photo4->move(public_path('uploads/'), $final_name);
            $about_item->photo4 = $final_name;
        }

        $about_item->year = $request->year;
        $about_item->subheading = $request->subheading;
        $about_item->heading = $request->heading;
        $about_item->item1_icon = $request->item1_icon;
        $about_item->item1_heading = $request->item1_heading;
        $about_item->item1_text = $request->item1_text;
        $about_item->item2_icon = $request->item2_icon;
        $about_item->item2_heading = $request->item2_heading;
        $about_item->item2_text = $request->item2_text;
        $about_item->button_text = $request->button_text;
        $about_item->button_link = $request->button_link;
        $about_item->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }


}
