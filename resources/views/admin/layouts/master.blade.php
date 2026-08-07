<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <meta name="description" content="Amr Admin Panel">
    @include('admin.layouts.styles')
</head>
<body>

<div class="admin-wrapper">

    @include('admin.layouts.sidebar')

    <!-- Main -->
    <div class="main-wrapper">

        @include('admin.layouts.top')

        <!-- Content -->
        <main class="content-area">
            @yield('content')
        </main>
    </div>
</div>


@include('admin.layouts.scripts')

</body>
</html>



