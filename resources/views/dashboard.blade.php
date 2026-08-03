<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body{font-family:Arial,sans-serif;background:#f4f4f4;margin:0;padding:40px}
        .box{max-width:600px;margin:0 auto;background:#fff;padding:30px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.08)}
        button{padding:8px 14px;background:#dc2626;color:#fff;border:0;border-radius:4px;cursor:pointer}
        .msg{padding:10px;border-radius:4px;margin-bottom:12px;background:#dcfce7;color:#166534}
    </style>
</head>
<body>
<div class="box">
    @if(session('success'))<div class="msg">{{ session('success') }}</div>@endif
    <h2>Welcome, {{ auth()->user()->name }}</h2>
    <p>Email: {{ auth()->user()->email }}</p>
    <p>You are logged in.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>
