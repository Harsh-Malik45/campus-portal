<!DOCTYPE html>
<html>
<head>

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
                       <h3>Edit Student Result</h3>

                </div>

                <div class="card-body">

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                     <form id="resultForm"
      action="{{ route('results.update', $result->id) }}"
      method="POST">

    @csrf
    @method('PUT')

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Student
                            </label>

                            <select name="student_id"
                                    class="form-select">

                                <option value="">
                                    Select Student
                                </option>

                                @foreach($students as $student)

                                    <option
    value="{{ $student->id }}"
    {{ old('student_id', $result->student_id) == $student->id ? 'selected' : '' }}>

    {{ $student->name }} ({{ $student->roll_no }})

</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Subject
                            </label>

                            <input
                                type="text"
                                name="subject"
                                class="form-control"
                                value="{{ old('subject', $result->subject) }}"
                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Maximum Marks
                            </label>

                            <input
                                type="number"
                                name="max_marks"
                                class="form-control"
                                value="{{ old('max_marks', $result->max_marks) }}"

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Obtained Marks
                            </label>

                            <input
                                type="number"
                                name="obtained_marks"
                                class="form-control"
                                 value="{{ old('obtained_marks', $result->obtained_marks) }}"

                        </div>

                        <a href="{{ route('results.index') }}"
                           class="btn btn-secondary">
                            Back
                        </a>

                        <button
    type="submit"
    class="btn btn-warning">

    Update Result

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

    $("#resultForm").validate({

        rules: {

            student_id: {
                required: true
            },

            subject: {
                required: true,
                minlength: 2
            },

            max_marks: {
                required: true,
                digits: true,
                min: 1
            },

            obtained_marks: {
                required: true,
                digits: true,
                min: 0
            }

        },

        messages: {

            student_id: {
                required: "Please select a student."
            },

            subject: {
                required: "Please enter subject name.",
                minlength: "Subject name is too short."
            },

            max_marks: {
                required: "Enter maximum marks."
            },

            obtained_marks: {
                required: "Enter obtained marks."
            }

        },

        errorElement: "small",
        errorClass: "text-danger",

        highlight: function(element){
            $(element).addClass("is-invalid");
        },

        unhighlight: function(element){
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
        }

    });

});

</script>

</body>
</html>