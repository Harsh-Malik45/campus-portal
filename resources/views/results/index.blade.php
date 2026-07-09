 <!DOCTYPE html>
<html>

<head>

    <title>Result Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Result Management
            </h2>

            <p class="text-muted mb-0">
                Manage student results, import/export Excel files and update records.
            </p>

        </div>

        <a href="{{ route('results.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Add Result

        </a>

    </div>


    <div class="card shadow mb-4">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-lg-5">

                    <form action="{{ route('results.index') }}"
                          method="GET"
                          class="d-flex">

                        <input
                            type="text"
                            name="search"
                            class="form-control me-2"
                            placeholder="Search by Student, Roll No or Subject..."
                            value="{{ request('search') }}">

                        <button class="btn btn-dark">

                            <i class="fas fa-search"></i>

                        </button>

                    </form>

                </div>

                <div class="col-lg-7 text-end mt-3 mt-lg-0">

                    <a href="{{ route('results.template') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-download"></i>

                        Template

                    </a>

                    <a href="{{ route('results.import.form') }}"
                       class="btn btn-success">

                        <i class="fas fa-file-import"></i>

                        Import

                    </a>

                    <a href="{{ route('results.export') }}"
                       class="btn btn-info text-white">

                        <i class="fas fa-file-export"></i>

                        Export

                    </a>

                </div>

            </div>

        </div>

    </div>


    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            <strong>Student Results</strong>

        </div>

        <div class="table-responsive">

            <table class="table table-hover table-bordered align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>ID</th>
                        <th>Student</th>
                        <th>Roll No</th>
                        <th>Subject</th>
                        <th>Max Marks</th>
                        <th>Obtained</th>
                        <th width="180" class="text-center">
                            Actions
                        </th>

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

                        <td>

                            <span class="badge bg-success fs-6">

                                {{ $result->obtained_marks }}

                            </span>

                        </td>

                        <td class="text-center">

                            <a href="{{ route('results.edit',$result->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('results.destroy',$result->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this result?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-5">

                            <i class="fas fa-folder-open fa-3x text-secondary mb-3"></i>

                            <h5>No Results Found</h5>

                            <p class="text-muted mb-0">

                                Click <strong>Add Result</strong> or import an Excel file.

                            </p>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            <div class="d-flex justify-content-center">

                {{ $results->appends(request()->query())->links() }}

            </div>

        </div>

    </div>

</div>

</body>

</html>