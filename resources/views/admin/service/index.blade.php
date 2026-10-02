@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Services</h1>
        </div>
        <a href="" class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fa-solid fa-plus me-1"></i>Add Item
        </a>
    </div>


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Service</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label">Photo *</label>
                            <input type="file" class="form-control"  name="photo" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Icon *</label>
                            <input type="text" class="form-control"  name="icon"  >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Title *</label>
                            <input type="text" class="form-control"  name="title"  >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Slug *</label>
                            <input type="text" class="form-control"  name="slug"  >
                        </div>


                        <div class="mb-3">
                            <label  class="form-label">Short Description </label>
                            <textarea class="form-control h_80" name="short_description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Description </label>
                            <textarea class="form-control tinymce-editor" name="description" rows="5"></textarea>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Show on home? *</label>
                            <select name="show_on_home" class="form-select">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
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
        <h1>Service</h1>
        <p>Server-side style datatable with search, sort & pagination.</p>
    </div>

    <div class="card-custom-p5">
        <table id="dataTable" class="table-dt ">
            <thead>
            <tr>
                <th>SL</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Show on Home</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-medium">
                        <img src="{{ asset('uploads/'.$service->photo) }}" alt="Service Photo" class="w_150" >
                    </td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->slug }}</td>
                    <td>
                        @if ($service->show_on_home == 'Yes')
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $service->id }}">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $service->id }}">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $service->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="editModalLabel{{ $service->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $service->id }}">Edit Service</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$service->photo) }}" alt="Service Photo" class="w_150">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Change Photo</label>
                                        <div>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Icon *</label>
                                        <input type="text" name="icon" class="form-control" value="{{ $service->icon }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title *</label>
                                        <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug *</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $service->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Short Description *</label>
                                        <textarea name="short_description" class="form-control h_80" rows="3">{{ $service->short_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control tinymce-editor" rows="5">{{ $service->description }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Show on home? *</label>
                                        <select name="show_on_home" class="form-select">
                                            <option value="Yes" {{ $service->show_on_home == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $service->show_on_home == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
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
                <div class="modal fade" id="deleteModal{{ $service->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="deleteModalLabel{{ $service->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $service->id }}">Delete Service</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.service.destroy', $service->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label  class="form-label">Are you sure you want to delete this service?</label>
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
