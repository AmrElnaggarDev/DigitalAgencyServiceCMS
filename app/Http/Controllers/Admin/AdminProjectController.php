<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id','asc')->get();
        return view('admin.project.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:projects,slug',
            'category' => 'required',
            'description' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'project_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $project = new Project();
        $project->photo = $final_name;
        $project->title = $request->title;
        $project->slug = $request->slug;
        $project->category = $request->category;
        $project->description = $request->description;
        $project->location = $request->location;
        $project->client = $request->client;
        $project->manager = $request->manager;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->show_on_home = $request->show_on_home;
        $project->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:projects,slug,'.$project->id,
            'category' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'project_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($project->photo && file_exists(public_path('uploads/'.$project->photo))) {
                unlink(public_path('uploads/'.$project->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $project->photo = $final_name;
        }

        $project->title = $request->title;
        $project->slug = $request->slug;
        $project->category = $request->category;
        $project->description = $request->description;
        $project->location = $request->location;
        $project->client = $request->client;
        $project->manager = $request->manager;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->show_on_home = $request->show_on_home;
        $project->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();
        if($project->photo && file_exists(public_path('uploads/'.$project->photo))) {
            unlink(public_path('uploads/'.$project->photo));
        }
        $project->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
