@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Site Settings</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-10">
            <div class="card-custom-p">
                <h2 class="section-title">General Branding Settings</h2>

                <form action="{{ route('admin.settings.update') }}" method="post" class="space-y-4" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="label-custom">Website Name</label>
                        <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name ?? '') }}" class="form-control-custom" placeholder="My Company">
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="label-custom">Header Logo</label>
                                @if(!empty($setting->logo_header))
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/' . $setting->logo_header) }}" style="max-height:60px; max-width:200px; object-fit:contain;">
                                    </div>
                                @endif
                                <input type="file" name="logo_header" class="form-control-custom">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="label-custom">Footer Logo</label>
                                @if(!empty($setting->logo_footer))
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/' . $setting->logo_footer) }}" style="max-height:60px; max-width:200px; object-fit:contain;">
                                    </div>
                                @endif
                                <input type="file" name="logo_footer" class="form-control-custom">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="label-custom">Mobile Sidebar Logo</label>
                                @if(!empty($setting->logo_mobile))
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/' . $setting->logo_mobile) }}" style="max-height:60px; max-width:200px; object-fit:contain;">
                                    </div>
                                @endif
                                <input type="file" name="logo_mobile" class="form-control-custom">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="label-custom">Favicon</label>
                                @if(!empty($setting->favicon))
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/' . $setting->favicon) }}" style="max-height:48px; max-width:48px; object-fit:contain;">
                                    </div>
                                @endif
                                <input type="file" name="favicon" class="form-control-custom">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="label-custom">Page Banner</label>
                        @if(!empty($setting->page_banner))
                            <div class="mb-2">
                                <img src="{{ asset('uploads/' . $setting->page_banner) }}" style="max-height:120px; max-width:100%; object-fit:cover;">
                            </div>
                        @endif
                        <input type="file" name="page_banner" class="form-control-custom">
                    </div>

                    <div class="mb-3">
                        <label class="label-custom">Footer Text</label>
                        <textarea name="footer_text" class="form-control-custom h_100" rows="4" placeholder="Short description shown in the footer.">{{ old('footer_text', $setting->footer_text ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="label-custom">Footer Copyright Text</label>
                        <input type="text" name="copyright_text" value="{{ old('copyright_text', $setting->copyright_text ?? '') }}" class="form-control-custom" placeholder="Copyright ©2026 Company Name. All Rights Reserved">
                    </div>

                    <div>
                        <button type="submit" class="btn-admin-primary">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
