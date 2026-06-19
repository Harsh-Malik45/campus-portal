 <!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row">

        <div class="col-md-4">
            <div class="card text-center shadow">

                <div class="card-body">

                    <h2>{{ $totalUsers }}</h2>

                    <p>Total Users</p>

                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow">

                <div class="card-body">

                    <h2>{{ $totalAdmins }}</h2>

                    <p>Total Admins</p>

                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow">

                <div class="card-body">

                    <h2>{{ $totalNotices }}</h2>

                    <p>Total Notices</p>

                </div>

            </div>
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
</html>