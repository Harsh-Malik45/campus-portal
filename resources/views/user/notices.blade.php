<!DOCTYPE html>
<html>
<head>
    <title>Notice Board</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

                <p>
                    {{ $notice->description }}
                </p>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>