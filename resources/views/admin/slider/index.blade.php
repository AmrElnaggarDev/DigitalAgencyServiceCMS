@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Sliders</h1>
        </div>
        <a href="" class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fa-solid fa-plus me-1"></i>Add Item
        </a>
    </div>


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label">Photo</label>
                            <input type="file" class="form-control"  name="photo" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Subheading</label>
                            <input type="text" class="form-control"  name="subheading"  >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Heading</label>
                            <textarea class="form-control h_80" name="heading" rows="3" ></textarea>
                        </div>


                        <div class="mb-3">
                            <label  class="form-label">Button Text</label>
                            <input type="text" class="form-control"  name="button_text"  >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Button Link</label>
                            <input type="text" class="form-control"  name="button_link"  >
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- // Add Modal -->

    <div class="page-heading">
        <h1>Slider</h1>
        <p>Server-side style datatable with search, sort & pagination.</p>
    </div>

    <div class="card-custom-p5">
        <table id="dataTable" class="table-dt ">
            <thead>
            <tr>
                <th>SL</th>
                <th>Photo</th>
                <th>Subheading</th>
                <th>Heading</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($sliders as $slider)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-medium">
                        <img src="{{ asset('uploads/'.$slider->photo) }}" alt="Slider Photo" class="w_150" >
                    </td>
                    <td>{{ $slider->subheading }}</td>
                    <td>{{ $slider->heading }}</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $slider->id }}">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $slider->id }}">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="editModalLabel{{ $slider->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $slider->id }}">Edit Slider</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label  class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/' . $slider->photo) }}" alt="Existing Photo" class="w_150">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">Change Photo</label>
                                        <div>
                                            <input type="file" class="form-control"  name="photo" >
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">Subheading</label>
                                        <input type="text" class="form-control"  name="subheading" value="{{ $slider->subheading }}" >
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label">Heading</label>
                                        <textarea class="form-control h_80" name="heading" rows="3">{{ $slider->heading }}</textarea>
                                    </div>


                                    <div class="mb-3">
                                        <label  class="form-label">Button Text</label>
                                        <input type="text" class="form-control"  name="button_text" value="{{ $slider->button_text }}" >
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label">Button Link</label>
                                        <input type="text" class="form-control"  name="button_link" value="{{ $slider->button_link }}" >
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- // Edit Modal -->

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="deleteModalLabel{{ $slider->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $slider->id }}">Delete Slider</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label  class="form-label">Are you sure you want to delete this slider?</label>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-danger">Delete </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- // Delete Modal -->
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
