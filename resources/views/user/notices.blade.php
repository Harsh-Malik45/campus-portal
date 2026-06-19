 <!DOCTYPE html>
<html>
<head>
    <title>Notice Board</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">

    <h2 class="mb-4">
        Latest Notices
    </h2>

    @foreach($notices as $notice)

        <div class="card mb-3">

            <div class="card-body">

                <h4>
                    {{ $notice->title }}
                </h4>

                <small class="text-muted">
                    Published:
                    {{ $notice->created_at->format('d M Y') }}
                </small>

                <p class="mt-2">
                    {{ $notice->description }}
                </p>

                <a href="{{ route('user.notice.show', $notice->id) }}"
                   class="btn btn-primary btn-sm">
                    View Details
                </a>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>