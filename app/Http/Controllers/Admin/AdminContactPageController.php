<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPageItem;
use Illuminate\Http\Request;

class AdminContactPageController extends Controller
{
    public function index()
    {
        $contact_page_item = ContactPageItem::first();

        if (! $contact_page_item) {
            $contact_page_item = new ContactPageItem();
        }

        return view('admin.contact-page.index', compact('contact_page_item'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'map_iframe' => ['nullable', 'string'],
        ]);

        $contact_page_item = ContactPageItem::firstOrNew(['id' => 1]);
        $contact_page_item->email = $request->email;
        $contact_page_item->phone = $request->phone;
        $contact_page_item->address = $request->address;
        $contact_page_item->map_iframe = $request->map_iframe;
        $contact_page_item->save();

        return redirect()->back()->with('success', 'Contact page item is updated successfully.');
    }
}
