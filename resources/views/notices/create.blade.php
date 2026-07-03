 <!DOCTYPE html>
<html>
<head>
    <title>Create Notice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Create New Notice</h3>
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

                     <form id="noticeForm" action="{{ route('notices.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="{{ old('title') }}"
                                placeholder="Enter Notice Title"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Description
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="5"
                                placeholder="Enter Notice Description"
                                required>{{ old('description') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('notices.index') }}"
                               class="btn btn-secondary">
                                Back
                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary">
                                Save Notice
                            </button>

                        </div>

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

    $("#noticeForm").validate({

        rules: {
            title: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            description: {
                required: true,
                minlength: 10
            }
        },

        messages: {
            title: {
                required: "Please enter a title.",
                minlength: "Title must be at least 3 characters.",
                maxlength: "Title cannot exceed 255 characters."
            },
            description: {
                required: "Please enter a description.",
                minlength: "Description must be at least 10 characters."
            }
        },

        errorClass: "text-danger",

        errorElement: "small",

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