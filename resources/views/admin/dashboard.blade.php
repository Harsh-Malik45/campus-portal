 <!DOCTYPE html>
<html>

<head>
    <title>Campus Portal Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background-color: #f1f4f9;
        }

        .page-title {
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .stat-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            position: relative;
            color: #fff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.14);
        }

        .stat-card .card-body {
            position: relative;
            z-index: 2;
            padding: 1.5rem;
        }

        .stat-card .bg-icon {
            position: absolute;
            right: -10px;
            bottom: -15px;
            font-size: 5.5rem;
            opacity: 0.18;
            z-index: 1;
        }

        .stat-icon-badge {
            width: 44px;
            height: 44px;
            border-radius: 0.6rem;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin-bottom: 0.9rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0;
        }

        .grad-primary { background: linear-gradient(135deg, #4e73df, #3355c9); }
        .grad-success { background: linear-gradient(135deg, #1cc88a, #17a673); }
        .grad-warning { background: linear-gradient(135deg, #f6b93b, #e0980a); }
        .grad-info    { background: linear-gradient(135deg, #36b9cc, #2494a4); }
        .grad-danger  { background: linear-gradient(135deg, #e74a5f, #c72e42); }

        .notices-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        }

        .notices-card .card-header {
            background: #fff;
            border-bottom: 1px solid #eef0f4;
            border-radius: 1rem 1rem 0 0 !important;
            padding: 1.1rem 1.5rem;
            font-size: 1.05rem;
        }

        .notice-item {
            border: none;
            border-bottom: 1px solid #f0f2f6;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .notice-item:last-child {
            border-bottom: none;
        }

        .notice-icon {
            width: 38px;
            height: 38px;
            border-radius: 0.5rem;
            background: #fff8e6;
            color: #e0980a;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.9rem;
            flex-shrink: 0;
        }

        .notice-date {
            background: #f1f4f9;
            color: #6c757d;
            font-size: 0.78rem;
            padding: 0.3rem 0.7rem;
            border-radius: 2rem;
            white-space: nowrap;
        }
    </style>
</head>

<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5 mb-5">

    <div class="mb-4">
        <h1 class="page-title h2 mb-1">Campus Portal Dashboard</h1>
        <p class="text-muted mb-0">
            Welcome back, <strong>{{ auth()->user()->name }}</strong>
        </p>
    </div>

    <div class="row g-4">

        <!-- Users -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stat-card grad-primary h-100">
                <i class="fas fa-users bg-icon"></i>
                <div class="card-body">
                    <div class="stat-icon-badge"><i class="fas fa-users"></i></div>
                    <p class="stat-value">{{ $totalUsers }}</p>
                    <p class="stat-label">Users</p>
                </div>
            </div>
        </div>

        <!-- Admins -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stat-card grad-success h-100">
                <i class="fas fa-user-shield bg-icon"></i>
                <div class="card-body">
                    <div class="stat-icon-badge"><i class="fas fa-user-shield"></i></div>
                    <p class="stat-value">{{ $totalAdmins }}</p>
                    <p class="stat-label">Admins</p>
                </div>
            </div>
        </div>

        <!-- Notices -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stat-card grad-warning h-100">
                <i class="fas fa-bullhorn bg-icon"></i>
                <div class="card-body">
                    <div class="stat-icon-badge"><i class="fas fa-bullhorn"></i></div>
                    <p class="stat-value">{{ $totalNotices }}</p>
                    <p class="stat-label">Notices</p>
                </div>
            </div>
        </div>

        <!-- Students -->
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card grad-info h-100">
                <i class="fas fa-user-graduate bg-icon"></i>
                <div class="card-body">
                    <div class="stat-icon-badge"><i class="fas fa-user-graduate"></i></div>
                    <p class="stat-value">{{ $totalStudents }}</p>
                    <p class="stat-label">Students</p>
                </div>
            </div>
        </div>

        <!-- Results -->
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card grad-danger h-100">
                <i class="fas fa-chart-line bg-icon"></i>
                <div class="card-body">
                    <div class="stat-icon-badge"><i class="fas fa-chart-line"></i></div>
                    <p class="stat-value">{{ $totalResults }}</p>
                    <p class="stat-label">Results</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Notices -->
    <div class="card notices-card mt-4">
        <div class="card-header fw-bold d-flex align-items-center">
            <i class="fas fa-bullhorn text-warning me-2"></i> Recent Notices
        </div>
        <div class="card-body p-0">
            @if($recentNotices->count())
                @foreach($recentNotices as $notice)
                    <div class="notice-item">
                        <div class="d-flex align-items-center">
                            <div class="notice-icon"><i class="fas fa-bullhorn"></i></div>
                            <span>{{ $notice->title }}</span>
                        </div>
                        <span class="notice-date">{{ $notice->created_at->format('d M Y') }}</span>
                    </div>
                @endforeach
            @else
                <p class="text-muted mb-0 p-4">No notices available.</p>
            @endif
        </div>
    </div>

</div>

</body>

</html>