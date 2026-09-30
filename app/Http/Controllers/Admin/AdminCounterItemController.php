<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CounterItem;

class AdminCounterItemController extends Controller
{
    public function index()
    {
        $counter_item = CounterItem::where('id',1)->first();
        return view('admin.counter-item.index', compact('counter_item'));
    }

    public function update(Request $request)
    {
        $counter_item = CounterItem::where('id',1)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'counter_item_photo_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($counter_item->photo && file_exists(public_path('uploads/'.$counter_item->photo))) {
                unlink(public_path('uploads/'.$counter_item->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $counter_item->photo = $final_name;
        }

        $counter_item->item1_icon = $request->item1_icon;
        $counter_item->item1_number = $request->item1_number;
        $counter_item->item1_text = $request->item1_text;
        $counter_item->item2_icon = $request->item2_icon;
        $counter_item->item2_number = $request->item2_number;
        $counter_item->item2_text = $request->item2_text;
        $counter_item->item3_icon = $request->item3_icon;
        $counter_item->item3_number = $request->item3_number;
        $counter_item->item3_text = $request->item3_text;
        $counter_item->item4_icon = $request->item4_icon;
        $counter_item->item4_number = $request->item4_number;
        $counter_item->item4_text = $request->item4_text;
        $counter_item->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }
}
