<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

@include('user.layouts.navbar')

<div class="dashboard-wrapper">
    @include('user.layouts.sidebar')

    <div class="dashboard-content">
        @yield('content')
    </div>
</div>

</body>
</html>
