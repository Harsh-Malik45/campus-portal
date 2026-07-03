 <!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

    <body>

@include('layouts.navbar')
@include('layouts.toastr')


<div class="container mt-5">

    <h1 class="mb-4">Admin Dashboard</h1>
    <h4 class="mb-4">
    Welcome, {{ auth()->user()->name }}
</h4>


    <div class="row">

        <div class="col-md-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body text-center">
            <i class="fas fa-users fa-3x mb-3"></i>
            <h2>{{ $totalUsers }}</h2>
            <p>Total Users</p>
        </div>
    </div>
</div>
        <div class="col-md-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body text-center">
            <i class="fas fa-user-shield fa-3x mb-3"></i>
            <h2>{{ $totalAdmins }}</h2>
            <p>Total Admins</p>
        </div>
    </div>
</div>

        <div class="col-md-4">
    <div class="card bg-warning text-dark shadow">
        <div class="card-body text-center">
            <i class="fas fa-bullhorn fa-3x mb-3"></i>
            <h2>{{ $totalNotices }}</h2>
            <p>Total Notices</p>
        </div>
    </div>
</div>

    </div>

    <div class="card mt-4">

    <div class="card-header">
        Recent Notices
    </div>

    <div class="card-body">

        <ul>

            @foreach($recentNotices as $notice)

                <li>
                    {{ $notice->title }}
                </li>

            @endforeach

        </ul>

    </div>

</div>

    <div class="mt-4">

        <a href="{{ route('notices.index') }}"
           class="btn btn-primary">
            Manage Notices
        </a>

        <a href="{{ route('users.index') }}"
           class="btn btn-success">
            Manage Users
        </a>

    </div>

</div>


</body>

 <body>

</html>