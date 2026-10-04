<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id','asc')->get();
        return view('admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:services,slug',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'service_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $service = new Service();
        $service->photo = $final_name;
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->show_on_home = $request->show_on_home;
        $service->save();

        return redirect()->back()->with('success', 'Service added successfully.');
    }

    public function update(Request $request, $id)
    {
        $service = Service::where('id', $id)->first();

        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:services,slug,'.$service->id,
            'short_description' => 'required',
            'description' => 'required',
        ]);


        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'service_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($service->photo && file_exists(public_path('uploads/'.$service->photo))) {
                unlink(public_path('uploads/'.$service->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $service->photo = $final_name;
        }

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->show_on_home = $request->show_on_home;
        $service->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $service = Service::where('id', $id)->first();
        if($service->photo && file_exists(public_path('uploads/'.$service->photo))) {
            unlink(public_path('uploads/'.$service->photo));
        }
        $service->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
