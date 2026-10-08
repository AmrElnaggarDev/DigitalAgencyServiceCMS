@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Packages</h1>
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
                    <form action="{{ route('admin.package.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Heading *</label>
                            <input type="text" name="heading" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subheading *</label>
                            <input type="text" name="subheading" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Currency Symbol *</label>
                            <input type="text" name="currency_symbol" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price *</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Is Featured? *</label>
                            <select name="is_featured" class="form-select">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
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
                <th>Heading</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Features</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $package->heading }}</td>
                    <td>{{ $package->currency_symbol }}{{ $package->price }}</td>
                    <td>
                        @if($package->is_featured == 'Yes')
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.package.feature', $package->id) }}" class="btn btn-info btn-sm">Features</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $package->id }}">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $package->id }}">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </a>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $package->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $package->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $package->id }}">Edit Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.package.update', $package->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Heading *</label>
                                        <input type="text" name="heading" class="form-control" value="{{ $package->heading }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Subheading *</label>
                                        <input type="text" name="subheading" class="form-control" value="{{ $package->subheading }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Currency Symbol *</label>
                                        <input type="text" name="currency_symbol" class="form-control" value="{{ $package->currency_symbol }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price *</label>
                                        <input type="text" name="price" class="form-control" value="{{ $package->price }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Is Featured? *</label>
                                        <select name="is_featured" class="form-select">
                                            <option value="No" {{ $package->is_featured == 'No' ? 'selected' : '' }}>No</option>
                                            <option value="Yes" {{ $package->is_featured == 'Yes' ? 'selected' : '' }}>Yes</option>
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
                <div class="modal fade" id="deleteModal{{ $package->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $package->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $package->id }}">Delete Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.package.destroy', $package->id) }}" method="post">
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
