 <!DOCTYPE html>
<html>
<head>
    <title>Edit Notice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0">Edit Notice</h3>
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

                    <form action="{{ route('notices.update', $notice->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">
                                Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="{{ old('title', $notice->title) }}"
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
                                required>{{ old('description', $notice->description) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('notices.index') }}"
                               class="btn btn-secondary">
                                Back
                            </a>

                            <button type="submit"
                                    class="btn btn-warning">
                                Update Notice
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>