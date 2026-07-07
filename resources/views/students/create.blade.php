<!DOCTYPE html>
<html>
<head>

    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

@include('layouts.navbar')

@include('layouts.toastr')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3>Add Student</h3>
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

                     <form id="studentForm"
      action="{{ route('students.store') }}"
      method="POST">

                        @csrf

                        <div class="mb-3">

                            <label>Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}">

                        </div>

                        <div class="mb-3">

                            <label>Roll Number</label>

                            <input
                                type="text"
                                name="roll_no"
                                class="form-control"
                                value="{{ old('roll_no') }}">

                        </div>

                        <div class="mb-3">

                            <label>Year</label>

                            <input
                                type="number"
                                name="year"
                                class="form-control"
                                value="{{ old('year') }}">

                        </div>

                        <div class="mb-3">

                            <label>Semester</label>

                            <input
                                type="number"
                                name="semester"
                                class="form-control"
                                value="{{ old('semester') }}">

                        </div>

                        <div class="mb-3">

                            <label>Branch</label>

                            <input
                                type="text"
                                name="branch"
                                class="form-control"
                                value="{{ old('branch') }}">

                        </div>

                        <a href="{{ route('students.index') }}"
                           class="btn btn-secondary">
                            Back
                        </a>

                        <button
                            class="btn btn-primary">
                            Save Student
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>


   <script>

$(document).ready(function () {

    $("#studentForm").validate({

        rules: {

            name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },

            roll_no: {
                required: true
            },

            year: {
                required: true,
                digits: true,
                min: 1,
                max: 4
            },

            semester: {
                required: true,
                digits: true,
                min: 1,
                max: 8
            },

            branch: {
                required: true,
                minlength: 2
            }

        },

        messages: {

            name: {
                required: "Please enter student name.",
                minlength: "Name must contain at least 3 characters."
            },

            roll_no: {
                required: "Please enter roll number."
            },

            year: {
                required: "Please enter year.",
                digits: "Year must be a number.",
                min: "Minimum year is 1.",
                max: "Maximum year is 4."
            },

            semester: {
                required: "Please enter semester.",
                digits: "Semester must be a number.",
                min: "Minimum semester is 1.",
                max: "Maximum semester is 8."
            },

            branch: {
                required: "Please enter branch.",
                minlength: "Branch name is too short."
            }

        },

        errorElement: "small",
        errorClass: "text-danger",

        highlight: function(element) {
            $(element).addClass("is-invalid");
        },

        unhighlight: function(element) {
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
        }

    });

});

</script>

</body>

</html>