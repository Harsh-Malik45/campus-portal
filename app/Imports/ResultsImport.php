<?php

namespace App\Imports;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResultsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $student = Student::where('roll_no', $row['roll_no'])->first();

            if ($student) {

               Result::updateOrCreate(

    [
        'student_id' => $student->id,
        'subject' => $row['subject'],
    ],

    [
        'max_marks' => $row['max_marks'],
        'obtained_marks' => $row['obtained_marks'],
    ]

);

                

            }

        }
    }
}