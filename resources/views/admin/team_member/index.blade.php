@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Team Members</h1>
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
                    <form action="{{ route('admin.team_member.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug *</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation *</label>
                            <input type="text" name="designation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Description *</label>
                            <textarea name="short_description" class="form-control h_80" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description *</label>
                            <textarea name="description" class="form-control tinymce-editor" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control">
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
            @foreach($team_members as $team_member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-medium">
                        <img src="{{ asset('uploads/'.$team_member->photo) }}" class="w_150">
                    </td>
                    <td>{{ $team_member->name }}</td>
                    <td>{{ $team_member->designation }}</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $team_member->id }}">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $team_member->id }}">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </a>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $team_member->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $team_member->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $team_member->id }}">Edit Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.team_member.update', $team_member->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$team_member->photo) }}" alt="Team Member Photo" class="w_150">
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
                                        <input type="text" name="name" class="form-control" value="{{ $team_member->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug *</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $team_member->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Designation *</label>
                                        <input type="text" name="designation" class="form-control" value="{{ $team_member->designation }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Short Description *</label>
                                        <textarea name="short_description" class="form-control h_80" rows="3">{{ $team_member->short_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control tinymce-editor" rows="3">{{ $team_member->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $team_member->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $team_member->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $team_member->address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="{{ $team_member->facebook }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="{{ $team_member->twitter }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" value="{{ $team_member->linkedin }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Instagram</label>
                                        <input type="text" name="instagram" class="form-control" value="{{ $team_member->instagram }}">
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
                <div class="modal fade" id="deleteModal{{ $team_member->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $team_member->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $team_member->id }}">Delete Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.team_member.destroy', $team_member->id) }}" method="post" enctype="multipart/form-data">
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
