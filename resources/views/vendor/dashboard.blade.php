<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor Dashboard</title>
    <style>
        body{font-family:Arial,sans-serif;background:#064e3b;margin:0;padding:40px;color:#fff}
        .box{max-width:700px;margin:0 auto;background:#fff;color:#111;padding:30px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.2)}
        .badge{display:inline-block;background:#065f46;color:#fff;padding:3px 10px;border-radius:4px;font-size:12px;letter-spacing:1px;margin-bottom:10px}
        button{padding:8px 14px;background:#dc2626;color:#fff;border:0;border-radius:4px;cursor:pointer}
        .msg{padding:10px;border-radius:4px;margin-bottom:12px;background:#dcfce7;color:#166534}
    </style>
</head>
<body>
<div class="box">
    <span class="badge">VENDOR PANEL</span>
    @if(session('success'))<div class="msg">{{ session('success') }}</div>@endif
    <h2>Welcome, {{ auth('vendor')->user()->name }}</h2>
    <p>Email: {{ auth('vendor')->user()->email }}</p>
    <p>You are logged in as a <strong>vendor</strong>.</p>
    <form method="POST" action="{{ route('vendor.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>


