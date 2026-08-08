<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <meta name="description" content="Arefin Admin Panel">
    @include('admin.layouts.styles')
</head>
<body>
<div class="admin-wrapper">
    @include('admin.layouts.sidebar')
    <div class="main-wrapper">
        @include('admin.layouts.top')
        <main class="content-area">
            @yield('content')
        </main>
    </div>
</div>
@include('admin.layouts.scripts')
<script>
    @if(session('success'))
    iziToast.success({
        message: '{{ session('success') }}',
        position: 'topRight'
    });
    @endif
    @if(session('error'))
    iziToast.error({
        message: '{{ session('error') }}',
        position: 'topRight'
    });
    @endif
    @if ($errors->any())
    iziToast.error({
        message: '{{ $errors->first() }}',
        position: 'topRight'
    });
    @endif
</script>
</body>
</html>
