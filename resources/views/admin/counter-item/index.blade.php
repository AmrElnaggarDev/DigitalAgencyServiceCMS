@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Counter Items</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card-custom-p">
                <h2 class="section-title">Edit Counter Items</h2>

                <form action="{{ route('admin.counter_item.update') }}" method="post" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="label-custom">Existing Photo</label>
                        <div><img src="{{ asset('uploads/'.$counter_item->photo) }}" class="h_100"></div>
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Change Photo</label>
                        <div><input type="file" name="photo"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 1 - Icon</label>
                                <input type="text" name="item1_icon" value="{{ $counter_item->item1_icon }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 1 - Number</label>
                                <input type="text" name="item1_number" value="{{ $counter_item->item1_number }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 1 - Text</label>
                                <input type="text" name="item1_text" value="{{ $counter_item->item1_text }}" class="form-control-custom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 2 - Icon</label>
                                <input type="text" name="item2_icon" value="{{ $counter_item->item2_icon }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 2 - Number</label>
                                <input type="text" name="item2_number" value="{{ $counter_item->item2_number }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 2 - Text</label>
                                <input type="text" name="item2_text" value="{{ $counter_item->item2_text }}" class="form-control-custom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 3 - Icon</label>
                                <input type="text" name="item3_icon" value="{{ $counter_item->item3_icon }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 3 - Number</label>
                                <input type="text" name="item3_number" value="{{ $counter_item->item3_number }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 3 - Text</label>
                                <input type="text" name="item3_text" value="{{ $counter_item->item3_text }}" class="form-control-custom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 4 - Icon</label>
                                <input type="text" name="item4_icon" value="{{ $counter_item->item4_icon }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 4 - Number</label>
                                <input type="text" name="item4_number" value="{{ $counter_item->item4_number }}" class="form-control-custom">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="label-custom">Item 4 - Text</label>
                                <input type="text" name="item4_text" value="{{ $counter_item->item4_text }}" class="form-control-custom">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn-admin-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
