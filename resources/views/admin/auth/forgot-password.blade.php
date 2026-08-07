<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Forgot Password</title>
    <meta name="description" content="Amr Admin Panel">
    @include('admin.layouts.styles')
</head>
<body class="login-page">

<div class="login-wrapper">
    <div class="login-box">

        <!-- Logo -->
        <div class="text-center mb-4">
            <h1 class="login-title">Forgot Password</h1>
            <p class="login-subtitle">Enter your email and we'll send you a reset link.</p>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mb-3">{{ session('error') }}</div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="mb-3">
                <label class="label-custom">Email Address</label>
                <div class="login-input-wrap">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" class="form-control-custom" placeholder="you@example.com"
                           name="email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                <div class="text-danger mt-1 small">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login w-100">Send Reset Link</button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-4 mb-0">
            <a href="{{ route('admin.login') }}" class="text-primary-600 text-decoration-none fw-medium">
                <i class="fa-solid fa-arrow-left me-1"></i>Back to Login
            </a>
        </p>
    </div>
</div>

@include('admin.layouts.scripts')

</body>
</html>
