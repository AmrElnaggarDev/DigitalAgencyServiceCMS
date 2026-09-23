<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id','asc')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'slider_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $slider = new Slider();
        $slider->photo = $final_name;
        $slider->subheading = $request->subheading;
        $slider->heading = $request->heading;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();

        return redirect()->back()->with('success', 'Slider added successfully.');
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'slider_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($slider->photo && file_exists(public_path('uploads/'.$slider->photo))) {
                unlink(public_path('uploads/'.$slider->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $slider->photo = $final_name;
        }

        $slider->subheading = $request->subheading;
        $slider->heading = $request->heading;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $slider = Slider::where('id', $id)->first();
        if($slider->photo && file_exists(public_path('uploads/'.$slider->photo))) {
            unlink(public_path('uploads/'.$slider->photo));
        }
        $slider->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }

}
