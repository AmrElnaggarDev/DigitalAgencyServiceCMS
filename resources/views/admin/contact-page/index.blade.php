@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Contact Page</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card-custom-p">
                <h2 class="section-title">Edit Contact Page</h2>

                <form action="{{ route('admin.contact-page.update') }}" method="post" class="space-y-4">
                    @csrf
                    <div class="mb-3">
                        <label class="label-custom">Email</label>
                        <input type="email" name="email" value="{{ old('email', $contact_page_item->email ?? '') }}" class="form-control-custom">
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $contact_page_item->phone ?? '') }}" class="form-control-custom">
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Address</label>
                        <textarea name="address" class="form-control-custom h_100">{{ old('address', $contact_page_item->address ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Map Iframe</label>
                        <textarea name="map_iframe" class="form-control-custom h_200">{{ old('map_iframe', $contact_page_item->map_iframe ?? '') }}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn-admin-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
