 <!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">User Dashboard</h3>
                </div>

                <div class="card-body text-center">

                    <h2 class="mb-3">
                        Welcome, {{ auth()->user()->name }}
                    </h2>

                    <p class="text-muted mb-4">
                        View the latest notices published by the administrator.
                    </p>

                    <a href="{{ route('user.notices') }}"
                       class="btn btn-primary btn-lg">
                        📢 View Notices
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>