<!DOCTYPE html>
<html>
<head>
    <title>Notice Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h2>{{ $notice->title }}</h2>

        </div>

        <div class="card-body">

            <p>
                {{ $notice->description }}
            </p>

            <hr>

            <strong>Published On:</strong>

            {{ $notice->created_at->format('d M Y') }}

        </div>

    </div>

</div>

</body>
</html>