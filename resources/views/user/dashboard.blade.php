<div class="container mt-5">

    <h2>
        Welcome, {{ auth()->user()->name }}
    </h2>

    <p>
        View the latest notices published by the administrator.
    </p>

    <a href="{{ route('user.notices') }}"
       class="btn btn-primary">
        View Notices
    </a>

</div>