<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-warning">
                    <h3 class="mb-0">Edit Student</h3>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="editStudentForm"
                          action="{{ route('students.update',$student->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name',$student->name) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Roll Number</label>

                            <input
                                type="text"
                                name="roll_no"
                                class="form-control"
                                value="{{ old('roll_no',$student->roll_no) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year</label>

                            <input
                                type="number"
                                name="year"
                                class="form-control"
                                value="{{ old('year',$student->year) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Semester</label>

                            <input
                                type="number"
                                name="semester"
                                class="form-control"
                                value="{{ old('semester',$student->semester) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Branch</label>

                            <input
                                type="text"
                                name="branch"
                                class="form-control"
                                value="{{ old('branch',$student->branch) }}">
                        </div>

                        <a href="{{ route('students.index') }}"
                           class="btn btn-secondary">
                            Back
                        </a>

                        <button
                            type="submit"
                            class="btn btn-warning">
                            Update Student
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>