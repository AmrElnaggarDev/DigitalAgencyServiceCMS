<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <meta name="description" content="Amr Admin Panel">
    <link rel="stylesheet" href="{{ asset("dist-admin/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("dist-admin/css/fontawesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("dist-admin/css/dataTables.min.css") }}">
    <link rel="stylesheet" href="{{ asset("dist-admin/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("dist-admin/css/flatpickr.min.css") }}">
    <link rel="stylesheet" href="{{ asset("dist-admin/css/style.css") }}">
</head>
<body class="login-page">

<div class="login-wrapper">
    <div class="login-box">

        <!-- Logo -->
        <div class="text-center mb-4">
            <h1 class="login-title">Admin Login</h1>
            <p class="login-subtitle">Sign in to your account</p>
        </div>

        <!-- Form -->
        @if(session('success'))<div class="badge bg-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="badge bg-danger">{{ session('error') }}</div>@endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-3">
                <label class="label-custom">Email Address</label>
                <div class="login-input-wrap">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" class="form-control-custom" placeholder="you@example.com"
                           name="email" value="{{ old('email') }}"
                    >
                </div>
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror

            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label class="form-label text-sm fw-medium text-gray-700 mb-0">Password</label>
                </div>
                <div class="login-input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password"  name="password" class="form-control-custom" placeholder="••••••••">
                </div>
                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <a href="{{ route('admin.password.request') }}" class="text-sm text-primary-600 text-decoration-none">Forgot password?</a>
            </div>

            <button type="submit" class="btn-login w-100">Sign In</button>
        </form>
    </div>
</div>

<script src="{{ asset('dist-admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/chart.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/dataTables.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/select2.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/flatpickr.min.js') }}"></script>
<script src="{{ asset('dist-admin/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/jscolor.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/app.js') }}"></script>
<script src="{{ asset('dist-admin/js/custom.js') }}"></script>

</body>
</html>
