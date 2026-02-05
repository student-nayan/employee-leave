<!DOCTYPE html>
<html>
<head>
    <title>Employee Leave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f5f5f5; }
        .sidebar {
            width: 220px;
            background: #fff;
            height: 100vh;
            position: fixed;
            box-shadow: 0 0 10px #ddd;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #eee;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .topbar {
            background: #00a3a3;
            color: #fff;
            padding: 15px 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="{{ route('login') }}">🔐 Login</a>
    <a href="{{ route('register') }}">📝 Register</a>

   
</div>


<div class="content">
    @yield('content')
</div>

</body>
</html>
