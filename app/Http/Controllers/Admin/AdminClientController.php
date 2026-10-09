<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class AdminClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id','asc')->get();
        return view('admin.client.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'client_'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/'), $final_name);

        $client = new Client();
        $client->photo = $final_name;
        $client->link = $request->link;
        $client->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $client = Client::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'client_'.time().'.'.$request->photo->getClientOriginalExtension();
            if($client->photo && file_exists(public_path('uploads/'.$client->photo))) {
                unlink(public_path('uploads/'.$client->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $client->photo = $final_name;
        }

        $client->link = $request->link;
        $client->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $client = Client::where('id', $id)->first();
        if($client->photo && file_exists(public_path('uploads/'.$client->photo))) {
            unlink(public_path('uploads/'.$client->photo));
        }
        $client->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
