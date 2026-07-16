<!DOCTYPE html>
<html>

<head>

    <title>Student Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

@include('layouts.navbar')

<div class="container mt-5">

    <h2>
        Welcome,
        {{ auth()->user()->name }}
    </h2>

    <div class="card mt-4">

        <div class="card-header bg-primary text-white">

            Student Information

        </div>

        <div class="card-body">

            <p><strong>Roll No:</strong>  {{ $student?->roll_no ?? 'Not Assigned' }}</p>

            <p><strong>Branch:</strong>  {{ $student?->branch ?? '-' }}</p>

            <p><strong>Year:</strong>  {{ $student?->year ?? '-' }}</p>

            <p><strong>Semester:</strong>  {{ $student?->semester ?? '-' }}</p>

        </div>

    </div>

    <div class="card mt-4">

        <div class="card-header">

            Latest Notices

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

</div>

</body>

</html>