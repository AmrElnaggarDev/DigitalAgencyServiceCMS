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

//    public function update(Request $request, $id)
//    {
//
//
//        $service = Service::where('id', $id)->first();
//
//        if($request->hasFile('photo')) {
//            $request->validate([
//                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            ]);
//            $final_name = 'service_'.time().'.'.$request->photo->getClientOriginalExtension();
//            if($service->photo && file_exists(public_path('uploads/'.$service->photo))) {
//                unlink(public_path('uploads/'.$service->photo));
//            }
//            $request->photo->move(public_path('uploads/'), $final_name);
//            $service->photo = $final_name;
//        }
//
//        $service->name = $request->name;
//        $service->slug = $request->slug;
//        $service->description = $request->description;
//        $service->save();
//
//        return redirect()->back()->with('success', 'Service updated successfully.');
//    }
//
//    public function destroy(Request $request, $id)
//    {
//        $service = Service::where('id', $id)->first();
//        if($service->photo && file_exists(public_path('uploads/'.$service->photo))) {
//            unlink(public_path('uploads/'.$service->photo));
//        }
//        $service->delete();
//
//        return redirect()->back()->with('success', 'Service deleted successfully.');
//    }

}
