<!DOCTYPE html>
<html>

<head>

    <title>Import Results</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h3 class="mb-0">Import Results From Excel</h3>

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

                    <form action="{{ route('results.import') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Select Excel File

                            </label>

                            <input
                                type="file"
                                name="file"
                                class="form-control"
                                accept=".xlsx,.xls"
                                required>

                        </div>

                        <a href="{{ route('results.index') }}"
                           class="btn btn-secondary">

                            Back

                        </a>

                        <button
                            type="submit"
                            class="btn btn-success">

                            Import Results

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>