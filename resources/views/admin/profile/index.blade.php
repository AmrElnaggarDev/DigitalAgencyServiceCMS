@extends('admin.layouts.master')

@section('content')
    <div class="page-heading">
        <h1>My Profile</h1>
        <p>Manage your account information.</p>
    </div>
    <form action="{{ route('admin.profile.update') }}" method="post" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-12 col-xl-4">
                <div class="card-custom-p text-center">
                    <div class="d-flex flex-column align-items-center gap-3">
                        <div id="previewWrap" class="photo-preview-sm">
                            <span id="previewIcon" class="d-none text-white fs-4 fw-bold">AR</span>
                            <img id="photoPreview" class="w-100 h-100 img-cover" src="{{ asset('uploads/'.auth('admin')->user()->photo) }}" alt="Preview">
                        </div>
                        <div class="d-flex gap-2">
                            <label class="btn-admin-primary-sm cursor-pointer">
                                <i class="fa-solid fa-image me-1"></i>Change Photo
                                <input type="file" name="photo" class="d-none" id="photoUpload" accept="image/*">
                            </label>
                        </div>
                    </div>

                    <h2 class="text-lg fw-semibold mt-4">{{ auth('admin')->user()->name }}</h2>
                    <p class="text-sm text-gray-500">Administrator</p>
                    <p class="text-sm text-gray-400 mt-1">{{ auth('admin')->user()->email }}</p>

                    <hr class="my-3">

                    <div class="space-y-2 text-sm text-start">
                        <div class="d-flex justify-content-between">
                            <span class="text-gray-500">Member since</span>
                            <span class="fw-medium">{{ auth('admin')->user()->created_at->format('M Y') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-gray-500">Role</span>
                            <span class="fw-medium">Admin</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-gray-500">Status</span>
                            <span class="text-green-600 fw-medium">Active</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="col-12 col-xl-8">
                <div class="card-custom-p">
                    <h2 class="section-title">Edit Profile</h2>
                    <div class="mb-3">
                        <label class="label-custom">Name</label>
                        <input type="text" name="name" value="{{ auth('admin')->user()->name }}" class="form-control-custom">
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Email</label>
                        <input type="email" name="email" value="{{ auth('admin')->user()->email }}" class="form-control-custom">
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">New Password</label>
                        <input type="password" name="password" class="form-control-custom">
                    </div>
                    <div class="mb-3">
                        <label class="label-custom">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control-custom">
                    </div>
                    <div>
                        <button type="submit" class="btn-admin-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
