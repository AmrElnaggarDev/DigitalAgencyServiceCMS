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
                            <input type="text" class="form-control"  name="heading"  >
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
                            <button type="submit" class="btn btn-primary">Save Changes</button>
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
        <table id="dataTable" class="table-dt stripe hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Status</th>
                <th>Joined</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td class="fw-medium">Arefin Rahman</td>
                <td class="text-gray-500">arefin@example.com</td>
                <td>Engineering</td>
                <td>$8,500</td>
                <td><span class="badge-status bg-green-100 text-green-700">Active</span></td>
                <td class="text-gray-500">01 Jan 2024</td>
                <td>
                    <div class="d-flex align-items-center gap-1">
                        <button class="btn-icon btn-icon-edit btn-edit-row" data-name="Arefin Rahman" data-email="arefin@example.com"><i class="fa-solid fa-pen-to-square text-xs"></i></button>
                        <button class="btn-icon btn-icon-delete"><i class="fa-solid fa-trash text-xs"></i></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td class="fw-medium">Sarah Johnson</td>
                <td class="text-gray-500">sarah@example.com</td>
                <td>Marketing</td>
                <td>$6,200</td>
                <td><span class="badge-status bg-green-100 text-green-700">Active</span></td>
                <td class="text-gray-500">15 Feb 2024</td>
                <td>
                    <div class="d-flex align-items-center gap-1">
                        <button class="btn-icon btn-icon-edit btn-edit-row" data-name="Sarah Johnson" data-email="sarah@example.com"><i class="fa-solid fa-pen-to-square text-xs"></i></button>
                        <button class="btn-icon btn-icon-delete"><i class="fa-solid fa-trash text-xs"></i></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td class="fw-medium">Mike Peters</td>
                <td class="text-gray-500">mike@example.com</td>
                <td>Sales</td>
                <td>$5,800</td>
                <td><span class="badge-status bg-red-100 text-red-700">Inactive</span></td>
                <td class="text-gray-500">22 Mar 2024</td>
                <td>
                    <div class="d-flex align-items-center gap-1">
                        <button class="btn-icon btn-icon-edit btn-edit-row" data-name="Mike Peters" data-email="mike@example.com"><i class="fa-solid fa-pen-to-square text-xs"></i></button>
                        <button class="btn-icon btn-icon-delete"><i class="fa-solid fa-trash text-xs"></i></button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title fw-semibold" id="editModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-custom">
                    <form action="" method="post" id="editForm">
                        <div class="mb-3">
                            <label class="label-custom">Name</label>
                            <input type="text" id="editName" class="form-control-custom" placeholder="Full name">
                        </div>
                        <div class="mb-3">
                            <label class="label-custom">Email</label>
                            <input type="email" id="editEmail" class="form-control-custom" placeholder="Email address">
                        </div>
                    </form>
                </div>
                <div class="modal-footer modal-footer-custom">
                    <button type="button" class="btn-outline-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-admin-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Edit Modal -->
@endsection
