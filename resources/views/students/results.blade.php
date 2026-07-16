<!DOCTYPE html>
<html>
<head>

    <title>My Results</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

@include('layouts.navbar')

<div class="container mt-5">

    <h2 class="mb-4">

        My Results

    </h2>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            Student Information

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>

                    <p><strong>Roll No:</strong> {{ $student->roll_no }}</p>

                </div>

                <div class="col-md-6">

                    <p><strong>Branch:</strong> {{ $student->branch }}</p>

                    <p><strong>Semester:</strong> {{ $student->semester }}</p>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow mt-4">

        <div class="card-header bg-success text-white">

            Result Details

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>Subject</th>

                        <th>Max Marks</th>

                        <th>Obtained Marks</th>

                    </tr>

                </thead>

                <tbody>

                    @php

                        $totalMax = 0;
                        $totalObtained = 0;

                    @endphp

                    @forelse($results as $result)

                        @php

                            $totalMax += $result->max_marks;
                            $totalObtained += $result->obtained_marks;

                        @endphp

                        <tr>

                            <td>{{ $result->subject }}</td>

                            <td>{{ $result->max_marks }}</td>

                            <td>{{ $result->obtained_marks }}</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center">

                                No Results Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    @if($results->count())

        @php

            $percentage = ($totalObtained / $totalMax) * 100;

        @endphp

        <div class="row mt-4">

            <div class="col-md-4">

                <div class="card text-center shadow">

                    <div class="card-body">

                        <h5>Total Marks</h5>

                        <h3>{{ $totalObtained }} / {{ $totalMax }}</h3>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card text-center shadow">

                    <div class="card-body">

                        <h5>Percentage</h5>

                        <h3>{{ number_format($percentage,2) }}%</h3>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card text-center shadow">

                    <div class="card-body">

                        <h5>Grade</h5>

                        <h3>

                            @if($percentage >= 90)

                                A+

                            @elseif($percentage >= 80)

                                A

                            @elseif($percentage >= 70)

                                B

                            @elseif($percentage >= 60)

                                C

                            @elseif($percentage >= 50)

                                D

                            @else

                                F

                            @endif

                        </h3>

                    </div>

                </div>

            </div>

        </div>

    @endif

</div>

</body>

</html>