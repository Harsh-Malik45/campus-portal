<!DOCTYPE html>
<html>
<head>

    <title>Result Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

@include('layouts.navbar')

@include('layouts.toastr')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Result Management</h2>

        <form
            action="{{ route('results.index') }}"
            method="GET"
            class="d-flex">

            <input
                type="text"
                name="search"
                class="form-control me-2"
                placeholder="Search Student / Subject"
                value="{{ request('search') }}">

            <button class="btn btn-dark">
                Search
            </button>

        </form>

        <a href="{{ route('results.create') }}"
           class="btn btn-primary">

            Add Result

        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>

            <th>ID</th>

            <th>Student</th>

            <th>Roll No</th>

            <th>Subject</th>

            <th>Max Marks</th>

            <th>Obtained</th>

            <th width="180">Actions</th>

        </tr>

        </thead>

        <tbody>

        @forelse($results as $result)

            <tr>

                <td>{{ $result->id }}</td>

                <td>{{ $result->student->name }}</td>

                <td>{{ $result->student->roll_no }}</td>

                <td>{{ $result->subject }}</td>

                <td>{{ $result->max_marks }}</td>

                <td>{{ $result->obtained_marks }}</td>

                <td>

                    <a
                        href="{{ route('results.edit',$result->id) }}"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                        action="{{ route('results.destroy',$result->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this result?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7"
                    class="text-center">

                    No Results Found

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="d-flex justify-content-center">

        {{ $results->appends(request()->query())->links() }}

    </div>

</div>

</body>
</html>