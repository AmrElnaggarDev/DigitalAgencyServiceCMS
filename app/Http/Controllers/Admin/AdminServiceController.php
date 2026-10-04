<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFaq;
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
        ServiceFaq::where ('service_id', $id)->delete();

        $service = Service::where('id', $id)->first();
        if($service->photo && file_exists(public_path('uploads/'.$service->photo))) {
            unlink(public_path('uploads/'.$service->photo));
        }
        $service->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }


    public function faq($service_id)
    {
        $service = Service::where('id', $service_id)->first();
        return view('admin.service.faq', compact('service'));
    }

    public function faq_store (Request $request, $service_id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $obj = new ServiceFaq();
        $obj->service_id = $service_id;
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();
        return redirect()->back()->with('success', 'Item is added successfully.');
    }


    public function faq_update(Request $request, $id)
    {
        $faq = ServiceFaq::where('id', $id)->first();
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }


    public function faq_destroy(Request $request, $id)
    {
        $obj = ServiceFaq::where('id', $id)->first();
        $obj->delete();
        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
