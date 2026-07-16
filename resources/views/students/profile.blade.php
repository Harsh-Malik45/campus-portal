 <!DOCTYPE html>
<html>
<head>

    <title>My Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

@include('layouts.navbar')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                My Profile
            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <tr>
                    <th width="30%">Name</th>
                    <td>{{ auth()->user()->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ auth()->user()->email }}</td>
                </tr>

                <tr>
                    <th>Roll Number</th>
                    <td>{{ $student?->roll_no ?? 'Not Assigned' }}</td>
                </tr>

                <tr>
                    <th>Branch</th>
                    <td>{{ $student?->branch ?? 'Not Assigned' }}</td>
                </tr>

                <tr>
                    <th>Year</th>
                    <td>{{ $student?->year ?? 'Not Assigned' }}</td>
                </tr>

                <tr>
                    <th>Semester</th>
                    <td>{{ $student?->semester ?? 'Not Assigned' }}</td>
                </tr>

            </table>

        </div>

    </div>

</div>

</body>
</html>