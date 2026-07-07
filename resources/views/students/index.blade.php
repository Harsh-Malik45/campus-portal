<!DOCTYPE html>
<html>
<head>
    <title>Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Student Management</h2>

        <a href="{{ route('students.create') }}"
           class="btn btn-primary">
            Add Student
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Branch</th>
                <th width="180">Actions</th>

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

                    <a href="{{ route('students.edit',$student->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('students.destroy',$student->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this student?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7" class="text-center">
                    No Students Found
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="d-flex justify-content-center">

        {{ $students->links() }}

    </div>

</div>

</body>
</html>