<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body{font-family:Arial,sans-serif;background:#1f2937;margin:0;padding:40px;color:#fff}
        .box{max-width:700px;margin:0 auto;background:#fff;color:#111;padding:30px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.2)}
        .badge{display:inline-block;background:#111827;color:#fff;padding:3px 10px;border-radius:4px;font-size:12px;letter-spacing:1px;margin-bottom:10px}
        button{padding:8px 14px;background:#dc2626;color:#fff;border:0;border-radius:4px;cursor:pointer}
        .msg{padding:10px;border-radius:4px;margin-bottom:12px;background:#dcfce7;color:#166534}
    </style>
</head>
<body>
<div class="box">
    <span class="badge">ADMIN PANEL</span>
    @if(session('success'))<div class="msg">{{ session('success') }}</div>@endif
    <h2>Welcome, {{ auth('admin')->user()->name }}</h2>
    <p>Email: {{ auth('admin')->user()->email }}</p>
    <p>You are logged in as an <strong>admin</strong>.</p>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>
