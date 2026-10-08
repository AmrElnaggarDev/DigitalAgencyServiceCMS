<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id','asc')->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'testimonial_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $testimonial = new Testimonial();
        $testimonial->photo = $final_name;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'testimonial_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($testimonial->photo && file_exists(public_path('uploads/'.$testimonial->photo))) {
                unlink(public_path('uploads/'.$testimonial->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $testimonial->photo = $final_name;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        if($testimonial->photo && file_exists(public_path('uploads/'.$testimonial->photo))) {
            unlink(public_path('uploads/'.$testimonial->photo));
        }
        $testimonial->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
