 <!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">
        Admin Dashboard
    </h1>

    <div class="row">

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">

                    <h3>{{ $totalUsers }}</h3>

                    <p>Total Users</p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">

                    <h3>{{ $totalAdmins }}</h3>

                    <p>Total Admins</p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">

                    <h3>{{ $totalNormalUsers }}</h3>

                    <p>Total Normal Users</p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">

                    <h3>{{ $totalNotices }}</h3>

                    <p>Total Notices</p>

                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>