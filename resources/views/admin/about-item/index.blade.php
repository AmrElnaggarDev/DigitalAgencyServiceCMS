@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>About Items</h1>
        </div>

    </div>




    <div class="page-heading">
        <h1>Slider</h1>
        <p>Server-side style datatable with search, sort & pagination.</p>
    </div>


        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card-custom-p">
                    <h2 class="section-title">Edit About Items</h2>

                    <form action="{{ route('admin.about-item.update') }}" method="post" class="space-y-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="label-custom">Existing Photo 1</label>
                                    <div><img src="{{ asset('uploads/'.$about_item->photo1) }}" class="h_100"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="label-custom">Change Photo 1</label>
                                    <div><input type="file" name="photo1"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="label-custom">Existing Photo 2</label>
                                    <div><img src="{{ asset('uploads/'.$about_item->photo2) }}" class="h_100"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="label-custom">Change Photo 2</label>
                                    <div><input type="file" name="photo2"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="label-custom">Existing Photo 3</label>
                                    <div><img src="{{ asset('uploads/'.$about_item->photo3) }}" class="h_100"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="label-custom">Change Photo 3</label>
                                    <div><input type="file" name="photo3"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="label-custom">Existing Photo 4</label>
                                    <div><img src="{{ asset('uploads/'.$about_item->photo4) }}" class="h_100"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="label-custom">Change Photo 4</label>
                                    <div><input type="file" name="photo4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="label-custom">Year</label>
                            <textarea name="year" class="form-control-custom h_100">{{ $about_item->year }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="label-custom">Subheading</label>
                            <input type="text" name="subheading" value="{{ $about_item->subheading }}" class="form-control-custom">
                        </div>
                        <div class="mb-3">
                            <label class="label-custom">Heading</label>
                            <textarea name="heading" class="form-control-custom h_100">{{ $about_item->heading }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="label-custom">Item 1 - Icon</label>
                                    <input type="text" name="item1_icon" value="{{ $about_item->item1_icon }}" class="form-control-custom">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="label-custom">Item 1 - Heading</label>
                                    <input type="text" name="item1_heading" value="{{ $about_item->item1_heading }}" class="form-control-custom">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="label-custom">Item 1 - Text</label>
                                    <textarea name="item1_text" class="form-control-custom h_100">{{ $about_item->item1_text }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="label-custom">Item 2 - Icon</label>
                                    <input type="text" name="item2_icon" value="{{ $about_item->item2_icon }}" class="form-control-custom">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="label-custom">Item 2 - Heading</label>
                                    <input type="text" name="item2_heading" value="{{ $about_item->item2_heading }}" class="form-control-custom">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="label-custom">Item 2 - Text</label>
                                    <textarea name="item2_text" class="form-control-custom h_100">{{ $about_item->item2_text }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="label-custom">Button Text</label>
                            <input type="text" name="button_text" value="{{ $about_item->button_text }}" class="form-control-custom">
                        </div>
                        <div class="mb-3">
                            <label class="label-custom">Button Link</label>
                            <input type="text" name="button_link" value="{{ $about_item->button_link }}" class="form-control-custom">
                        </div>
                        <div>
                            <button type="submit" class="btn-admin-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




@endsection
