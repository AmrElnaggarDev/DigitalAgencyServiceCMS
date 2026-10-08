<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CtaItem;

class AdminCtaItemController extends Controller
{
    public function index()
    {
        $cta_item = CtaItem::where('id',1)->first();
        return view('admin.cta.index', compact('cta_item'));
    }

    public function update(Request $request)
    {
        $cta_item = CtaItem::where('id',1)->first();

        $cta_item->subheading = $request->subheading;
        $cta_item->heading = $request->heading;
        $cta_item->button_text = $request->button_text;
        $cta_item->button_link = $request->button_link;
        $cta_item->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }
}
