<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::firstOrNew(['id' => 1]);

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => ['nullable', 'string', 'max:255'],
            'footer_text' => ['nullable', 'string'],
            'copyright_text' => ['nullable', 'string', 'max:255'],
            'logo_header' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:2048'],
            'logo_footer' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:2048'],
            'logo_mobile' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:2048'],
            'favicon' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg,ico,webp', 'max:1024'],
            'page_banner' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:2048'],
            'preloader_status' => ['nullable', 'in:show,hide'],
            'preloader_icon' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:2048'],
            'preloader_logo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:2048'],
        ]);

        $setting = SiteSetting::firstOrNew(['id' => 1]);

        foreach (['logo_header', 'logo_footer', 'logo_mobile', 'favicon', 'page_banner', 'preloader_icon', 'preloader_logo'] as $field) {
            if ($request->hasFile($field)) {
                $existing = $setting->{$field};
                if ($existing && file_exists(public_path('uploads/' . $existing))) {
                    unlink(public_path('uploads/' . $existing));
                }

                $fileName = $field . '_' . time() . '_' . uniqid() . '.' . $request->{$field}->getClientOriginalExtension();
                $request->{$field}->move(public_path('uploads'), $fileName);
                $setting->{$field} = $fileName;
            }
        }

        $setting->site_name = $request->site_name ?: $setting->site_name;
        $setting->preloader_status = $request->preloader_status ?: ($setting->preloader_status ?? 'show');
        $setting->footer_text = $request->footer_text;
        $setting->copyright_text = $request->copyright_text;
        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Site settings updated successfully.');
    }
}
