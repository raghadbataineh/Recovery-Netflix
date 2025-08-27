<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <title>Admin Panel</title> -->
        <title>@yield('title', 'Recovery Admin Panel')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; min-height: 100vh; }
        .sidebar { width: 220px; background: #343a40; color: white; }
        .sidebar a { display: block; padding: 12px; color: white; text-decoration: none; }
        .sidebar a:hover { background: #495057; }
        .content { flex: 1; padding: 20px; }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
<h4 class="p-3">Admin Panel</h4>

<li>
    <a href="{{ route('admin.categories.index') }}">📂 Categories</a>
</li>

 @if(auth()->user()->role === 'admin')
        <li>
            <a href="{{ route('admin.users.index') }}">📂 Users</a>
        </li>
    @endif
@can('viewAny', App\Models\Episode::class)
    <li><a href="{{ route('admin.episodes.index') }}">🎞 Manage Episodes</a></li>
@endcan

<!-- @if(auth()->user()->isAdmin() || auth()->user()->isEmployee())
    <li><a href="{{ route('admin.episodes.index') }}">🎞 Manage Episodes</a></li>
@endif -->


@can('viewAny', App\Models\Series::class)
    <li><a href="{{ route('admin.series.index') }}">🎬 Manage Series</a></li>
@endcan


<li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-primary" >Logout</button>
    </form>
</li>


    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
