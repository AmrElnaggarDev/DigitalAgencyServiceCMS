<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body{font-family:Arial,sans-serif;background:#f4f4f4;margin:0;padding:40px}
        .box{max-width:420px;margin:0 auto;background:#fff;padding:30px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.08)}
        h2{margin-top:0}
        label{display:block;margin-top:12px;font-weight:600}
        input{width:100%;padding:8px;margin-top:4px;box-sizing:border-box;border:1px solid #ccc;border-radius:4px}
        button{margin-top:16px;width:100%;padding:10px;background:#2563eb;color:#fff;border:0;border-radius:4px;cursor:pointer}
        .err{color:#b91c1c;font-size:13px}
        .msg{padding:10px;border-radius:4px;margin-bottom:12px}
        .msg.success{background:#dcfce7;color:#166534}
        .msg.error{background:#fee2e2;color:#991b1b}
        a{color:#2563eb}
    </style>
</head>
<body>
<div class="box">
    <h2>Register</h2>
    @if(session('success'))<div class="msg success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="msg error">{{ session('error') }}</div>@endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')<div class="err">{{ $message }}</div>@enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')<div class="err">{{ $message }}</div>@enderror

        <label>Password</label>
        <input type="password" name="password">
        @error('password')<div class="err">{{ $message }}</div>@enderror

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">
        <button type="submit">Register</button>
    </form>
    <p style="margin-top:14px">Already have an account? <a href="{{ route('login') }}">Login</a></p>
</div>
</body>
</html>
