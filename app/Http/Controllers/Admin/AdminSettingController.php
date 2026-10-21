<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Rules\SafeImageUpload;
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
            'facebook_link' => ['nullable', 'url', 'max:255'],
            'twitter_link' => ['nullable', 'url', 'max:255'],
            'linkedin_link' => ['nullable', 'url', 'max:255'],
            'instagram_link' => ['nullable', 'url', 'max:255'],
            'layout_direction' => ['nullable', 'in:ltr,rtl'],
            'logo_header' => ['nullable', new SafeImageUpload(2048)],
            'logo_footer' => ['nullable', new SafeImageUpload(2048)],
            'logo_mobile' => ['nullable', new SafeImageUpload(2048)],
            'favicon' => ['nullable', new SafeImageUpload(1024)],
            'page_banner' => ['nullable', new SafeImageUpload(2048)],
            'preloader_status' => ['nullable', 'in:show,hide'],
            'preloader_icon' => ['nullable', new SafeImageUpload(2048)],
            'preloader_logo' => ['nullable', new SafeImageUpload(2048)],
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
        $setting->facebook_link = $request->facebook_link;
        $setting->twitter_link = $request->twitter_link;
        $setting->linkedin_link = $request->linkedin_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->layout_direction = $request->layout_direction ?: ($setting->layout_direction ?? 'ltr');
        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Site settings updated successfully.');
    }
}
