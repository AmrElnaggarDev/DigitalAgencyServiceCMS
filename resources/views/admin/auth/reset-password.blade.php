<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reset Password</title>
    <meta name="description" content="Amr Admin Panel">
    @include('admin.layouts.styles')
</head>
<body class="login-page">

<div class="login-wrapper">
    <div class="login-box">

        <!-- Logo -->
        <div class="text-center mb-4">
            <h1 class="login-title">Reset Password</h1>
            <p class="login-subtitle">Enter your new password below.</p>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mb-3">{{ session('error') }}</div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label class="label-custom">Email Address</label>
                <div class="login-input-wrap">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" name="email" class="form-control-custom" value="{{ old('email', $email ?? '') }}" required readonly>
                </div>
                @error('email')<div class="text-danger mt-1 small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="label-custom">New Password</label>
                <div class="login-input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="form-control-custom" placeholder="••••••••" required>
                </div>
                @error('password')<div class="text-danger mt-1 small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="label-custom">Confirm Password</label>
                <div class="login-input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password_confirmation" class="form-control-custom" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn-login w-100">Reset Password</button>
        </form>
    </div>
</div>

@include('admin.layouts.scripts')

</body>
</html>
