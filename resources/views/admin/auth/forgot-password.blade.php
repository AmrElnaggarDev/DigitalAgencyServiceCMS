<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Forgot Password</title>
    <style>
        body{font-family:Arial,sans-serif;background:#1f2937;margin:0;padding:40px;color:#111}
        .box{max-width:420px;margin:0 auto;background:#fff;padding:30px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.2)}
        .badge{display:inline-block;background:#1f2937;color:#fff;padding:3px 10px;border-radius:4px;font-size:12px;letter-spacing:1px;margin-bottom:10px}
        h2{margin-top:0}
        label{display:block;margin-top:12px;font-weight:600}
        input{width:100%;padding:8px;margin-top:4px;box-sizing:border-box;border:1px solid #ccc;border-radius:4px}
        button{margin-top:16px;width:100%;padding:10px;background:#111827;color:#fff;border:0;border-radius:4px;cursor:pointer}
        .err{color:#b91c1c;font-size:13px}
        .msg{padding:10px;border-radius:4px;margin-bottom:12px}
        .msg.success{background:#dcfce7;color:#166534}
        .msg.error{background:#fee2e2;color:#991b1b}
        a{color:#1f2937}
    </style>
</head>
<body>
<div class="box">
    <span class="badge">ADMIN PANEL</span>
    <h2>Forgot Password</h2>

    @if(session('success'))<div class="msg success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="msg error">{{ session('error') }}</div>@endif

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')<div class="err">{{ $message }}</div>@enderror

        <button type="submit">Send Reset Link</button>
    </form>
    <p style="margin-top:14px"><a href="{{ route('admin.login') }}">Back to Admin Login</a></p>
</div>
</body>
</html>
