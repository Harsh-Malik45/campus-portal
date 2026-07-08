 <!DOCTYPE html>
<html>

<head>

    <title>Campus Portal Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5">

    <div class="mb-4">

        <h1 class="fw-bold">
            Campus Portal Dashboard
        </h1>

        <p class="text-muted">
            Welcome back,
            <strong>{{ auth()->user()->name }}</strong>
        </p>

    </div>

    <div class="row g-4">

        <!-- Users -->
        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="card bg-primary text-white shadow h-100">

                <div class="card-body text-center">

                    <i class="fas fa-users fa-3x mb-3"></i>

                    <h2>{{ $totalUsers }}</h2>

                    <p class="mb-0">Users</p>

                </div>

            </div>

        </div>

        <!-- Admins -->
        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="card bg-success text-white shadow h-100">

                <div class="card-body text-center">

                    <i class="fas fa-user-shield fa-3x mb-3"></i>

                    <h2>{{ $totalAdmins }}</h2>

                    <p class="mb-0">Admins</p>

                </div>

            </div>

        </div>

        <!-- Notices -->
        <div class="col-lg-2 col-md-4 col-sm-6">

            <div class="card bg-warning text-dark shadow h-100">

                <div class="card-body text-center">

                    <i class="fas fa-bullhorn fa-3x mb-3"></i>

                    <h2>{{ $totalNotices }}</h2>

                    <p class="mb-0">Notices</p>

                </div>

            </div>

        </div>

        <!-- Students -->
        <div class="col-lg-3 col-md-6">

            <div class="card bg-info text-white shadow h-100">

                <div class="card-body text-center">

                    <i class="fas fa-user-graduate fa-3x mb-3"></i>

                    <h2>{{ $totalStudents }}</h2>

                    <p class="mb-0">Students</p>

                </div>

            </div>

        </div>

        <!-- Results -->
        <div class="col-lg-3 col-md-6">

            <div class="card bg-danger text-white shadow h-100">

                <div class="card-body text-center">

                    <i class="fas fa-chart-line fa-3x mb-3"></i>

                    <h2>{{ $totalResults }}</h2>

                    <p class="mb-0">Results</p>

                </div>

            </div>

        </div>

    </div>


    <!-- Recent Notices -->

    <div class="card shadow mt-4">

        <div class="card-header fw-bold">

            Recent Notices

        </div>

        <div class="card-body">

            @if($recentNotices->count())

                <ul class="list-group">

                    @foreach($recentNotices as $notice)

                        <li class="list-group-item d-flex justify-content-between">

                            <span>

                                <i class="fas fa-bullhorn text-warning"></i>

                                {{ $notice->title }}

                            </span>

                            <small class="text-muted">

                                {{ $notice->created_at->format('d M Y') }}

                            </small>

                        </li>

                    @endforeach

                </ul>

            @else

                <p class="text-muted mb-0">

                    No notices available.

                </p>

            @endif

        </div>

    </div>

</div>

</body>

</html>