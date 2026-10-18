@php $siteSetting = $global_setting ?? null; @endphp
<!DOCTYPE html>
<html lang="en" dir="{{ ($siteSetting && $siteSetting->layout_direction) ? $siteSetting->layout_direction : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteSetting->site_name ?? 'Admin Panel' }}</title>
    <meta name="description" content="Arefin Admin Panel">
    <link rel="icon" type="image/x-icon" href="{{ ($siteSetting && $siteSetting->favicon) ? asset('uploads/' . $siteSetting->favicon) : asset('dist-front/img/favicon.png') }}" />
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
