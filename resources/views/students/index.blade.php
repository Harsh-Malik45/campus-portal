 <!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-0">Student Management</h2>
            <small class="text-muted">
                Manage all students in the campus portal.
            </small>
        </div>

        <a href="{{ route('students.create') }}"
           class="btn btn-primary">
            + Add Student
        </a>

    </div>

    <div class="card shadow">

        <div class="card-header bg-light">

            <form method="GET"
                  action="{{ route('students.index') }}"
                  class="row g-2">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search by Name, Roll Number or Branch..."
                        value="{{ request('search') }}">

                </div>

                <div class="col-md-2 d-grid">

                    <button class="btn btn-dark">
                        Search
                    </button>

                </div>

            </form>

        </div>

        <div class="card-body p-0">

            <table class="table table-hover table-bordered mb-0">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll No</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Branch</th>
                        <th width="170">Actions</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>{{ $student->id }}</td>

                        <td>{{ $student->name }}</td>

                        <td>{{ $student->roll_no }}</td>

                        <td>{{ $student->year }}</td>

                        <td>{{ $student->semester }}</td>

                        <td>{{ $student->branch }}</td>

                        <td>

                            <a href="{{ route('students.edit', $student->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this student?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-4">

                            No Students Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            <div class="d-flex justify-content-center">

                {{ $students->appends(request()->query())->links() }}

            </div>

        </div>

    </div>

</div>

</body>
</html>