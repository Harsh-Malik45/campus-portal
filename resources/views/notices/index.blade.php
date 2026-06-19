 <!DOCTYPE html>
<html>
<head>
    <title>All Notices</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>All Notices</h2>

        <form method="GET"
              action="{{ route('notices.index') }}"
              class="d-flex">

            <input type="text"
                   name="search"
                   placeholder="Search Notice"
                   value="{{ request('search') }}"
                   class="form-control me-2">

            <button type="submit"
                    class="btn btn-dark">
                Search
            </button>

        </form>

        <a href="{{ route('notices.create') }}"
           class="btn btn-primary">
            Add Notice
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Date</th>
                <th width="200">Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach($notices as $notice)

            <tr>

                <td>{{ $notice->id }}</td>

                <td>{{ $notice->title }}</td>

                <td>
                    {{ $notice->created_at->format('d M Y') }}
                </td>

                <td>

                    <a href="{{ route('notices.edit', $notice->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('notices.destroy', $notice->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this notice?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $notices->appends(request()->query())->links() }}
    </div>

</div>

</body>
</html>