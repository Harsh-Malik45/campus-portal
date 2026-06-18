 <!DOCTYPE html>
<html>
<head>
    <title>All Notices</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h2>All Notices</h2>

        <form method="GET"
      action="{{ route('notices.index') }}"
      class="mb-3">

    <input type="text"
           name="search"
           placeholder="Search Notice"
           value="{{ request('search') }}">

    <button type="submit">
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
                <th width="200">Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach($notices as $notice)

            <tr>

                <td>{{ $notice->id }}</td>

                <td>{{ $notice->title }}</td>

                <td>

                    <a href="{{ route('notices.edit',$notice->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form
                        action="{{ route('notices.destroy',$notice->id) }}"
                        method="POST"
                        class="d-inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                        >
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>