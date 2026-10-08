@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>CTA Section</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card-custom-p">
                <h2 class="section-title">Edit CTA Section</h2>

                <form action="{{ route('admin.cta.update') }}" method="post" class="space-y-4">
                    @csrf
                    <div class="mb-3">
                        <label class="label-custom">Subheading</label>
                        <input type="text" name="subheading" value="{{ $cta_item->subheading }}" class="form-control-custom">
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Heading</label>
                        <textarea name="heading" class="form-control-custom h_100">{{ $cta_item->heading }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Button Text</label>
                        <input type="text" name="button_text" value="{{ $cta_item->button_text }}" class="form-control-custom">
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Button Link</label>
                        <input type="text" name="button_link" value="{{ $cta_item->button_link }}" class="form-control-custom">
                    </div>
                    <div>
                        <button type="submit" class="btn-admin-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
