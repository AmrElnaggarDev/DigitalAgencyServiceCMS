<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class AdminTeamMemberController extends Controller
{
    public function index()
    {
        $team_members = TeamMember::orderBy('id','asc')->get();
        return view('admin.team_member.index', compact('team_members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:team_members,slug',
            'designation' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'team_member_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $team_member = new TeamMember();
        $team_member->photo = $final_name;
        $team_member->name = $request->name;
        $team_member->slug = $request->slug;
        $team_member->designation = $request->designation;
        $team_member->short_description = $request->short_description;
        $team_member->description = $request->description;
        $team_member->email = $request->email;
        $team_member->phone = $request->phone;
        $team_member->address = $request->address;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->linkedin = $request->linkedin;
        $team_member->instagram = $request->instagram;
        $team_member->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $team_member = TeamMember::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:team_members,slug,'.$team_member->id,
            'designation' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'team_member_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($team_member->photo && file_exists(public_path('uploads/'.$team_member->photo))) {
                unlink(public_path('uploads/'.$team_member->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $team_member->photo = $final_name;
        }

        $team_member->name = $request->name;
        $team_member->slug = $request->slug;
        $team_member->designation = $request->designation;
        $team_member->short_description = $request->short_description;
        $team_member->description = $request->description;
        $team_member->email = $request->email;
        $team_member->phone = $request->phone;
        $team_member->address = $request->address;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->linkedin = $request->linkedin;
        $team_member->instagram = $request->instagram;
        $team_member->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $team_member = TeamMember::where('id', $id)->first();
        if($team_member->photo && file_exists(public_path('uploads/'.$team_member->photo))) {
            unlink(public_path('uploads/'.$team_member->photo));
        }
        $team_member->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
