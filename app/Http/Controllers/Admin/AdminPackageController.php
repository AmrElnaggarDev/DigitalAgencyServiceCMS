<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageFeature;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('id','asc')->get();
        return view('admin.package.index', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'subheading' => 'required',
            'currency_symbol' => 'required',
            'price' => 'required',
            'is_featured' => 'required',
        ]);

        $package = new Package();
        $package->heading = $request->heading;
        $package->subheading = $request->subheading;
        $package->currency_symbol = $request->currency_symbol;
        $package->price = $request->price;
        $package->is_featured = $request->is_featured;
        $package->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function update(Request $request, $id)
    {
        $package = Package::where('id', $id)->first();

        $request->validate([
            'heading' => 'required',
            'subheading' => 'required',
            'currency_symbol' => 'required',
            'price' => 'required',
            'is_featured' => 'required',
        ]);

        $package->heading = $request->heading;
        $package->subheading = $request->subheading;
        $package->currency_symbol = $request->currency_symbol;
        $package->price = $request->price;
        $package->is_featured = $request->is_featured;
        $package->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        PackageFeature::where('package_id', $id)->delete();

        $package = Package::where('id', $id)->first();
        $package->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }

    public function feature($package_id)
    {
        $package = Package::where('id', $package_id)->first();
        return view('admin.package.feature', compact('package'));
    }

    public function feature_store(Request $request, $package_id)
    {
        $request->validate([
            'feature' => 'required',
        ]);

        $obj = new PackageFeature();
        $obj->package_id = $package_id;
        $obj->feature = $request->feature;
        $obj->save();

        return redirect()->back()->with('success', 'Item is added successfully.');
    }

    public function feature_update(Request $request, $id)
    {
        $obj = PackageFeature::where('id', $id)->first();

        $request->validate([
            'feature' => 'required',
        ]);

        $obj->feature = $request->feature;
        $obj->save();

        return redirect()->back()->with('success', 'Item is updated successfully.');
    }

    public function feature_destroy(Request $request, $id)
    {
        $obj = PackageFeature::where('id', $id)->first();
        $obj->delete();

        return redirect()->back()->with('success', 'Item is deleted successfully.');
    }
}
