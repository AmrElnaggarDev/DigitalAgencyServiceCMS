@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Projects</h1>
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
                    <form action="{{ route('admin.project.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Photo *</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug *</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category *</label>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description *</label>
                            <textarea name="description" class="form-control tinymce-editor" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client</label>
                            <input type="text" name="client" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Manager</label>
                            <input type="text" name="manager" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="text" name="start_date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="text" name="end_date" class="form-control">
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


    <div class="card-custom-p5">
        <table id="dataTable" class="table-dt">
            <thead>
            <tr>
                <th>SL</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Show on Home</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-medium">
                        <img src="{{ asset('uploads/'.$project->photo) }}" class="w_150">
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->category }}</td>
                    <td>
                        @if($project->show_on_home == 'Yes')
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </a>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $project->id }}">Edit Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.project.update', $project->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$project->photo) }}" alt="Project Photo" class="w_150">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Change Photo</label>
                                        <div>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title *</label>
                                        <input type="text" name="title" class="form-control" value="{{ $project->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug *</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $project->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Category *</label>
                                        <input type="text" name="category" class="form-control" value="{{ $project->category }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control tinymce-editor" rows="3">{{ $project->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="location" class="form-control" value="{{ $project->location }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <input type="text" name="client" class="form-control" value="{{ $project->client }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Manager</label>
                                        <input type="text" name="manager" class="form-control" value="{{ $project->manager }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="text" name="start_date" class="form-control" value="{{ $project->start_date }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">End Date</label>
                                        <input type="text" name="end_date" class="form-control" value="{{ $project->end_date }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Show on home? *</label>
                                        <select name="show_on_home" class="form-select">
                                            <option value="Yes" {{ $project->show_on_home == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $project->show_on_home == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
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
                <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $project->id }}">Delete Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.project.destroy', $project->id) }}" method="post" enctype="multipart/form-data">
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
