@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Testimonials</h1>
        </div>
        <a href="" class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fa-solid fa-plus me-1"></i>Add Item
        </a>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Photo *</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation *</label>
                            <input type="text" name="designation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment *</label>
                            <textarea name="comment" class="form-control h_80" rows="4"></textarea>
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


    <div class="card-custom-p5">
        <table id="dataTable" class="table-dt">
            <thead>
            <tr>
                <th>SL</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-medium">
                        <img src="{{ asset('uploads/'.$testimonial->photo) }}" class="w_150" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                    </td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->designation }}</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $testimonial->id }}">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $testimonial->id }}">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </a>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $testimonial->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $testimonial->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $testimonial->id }}">Edit Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="Testimonial Photo" class="w_150" style="width: 120px; height: 120px; object-fit: cover; border-radius: 6px;">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Change Photo</label>
                                        <div>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Name *</label>
                                        <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Designation *</label>
                                        <input type="text" name="designation" class="form-control" value="{{ $testimonial->designation }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Comment *</label>
                                        <textarea name="comment" class="form-control h_80" rows="4">{{ $testimonial->comment }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Edit Modal -->

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $testimonial->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $testimonial->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $testimonial->id }}">Delete Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Are you sure want to delete this item?</label>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
