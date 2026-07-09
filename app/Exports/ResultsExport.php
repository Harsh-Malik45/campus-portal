<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Result::with('student')->get()->map(function ($result) {

            return [

                'Student Name' => $result->student->name,

                'Roll No' => $result->student->roll_no,

                'Subject' => $result->subject,

                'Max Marks' => $result->max_marks,

                'Obtained Marks' => $result->obtained_marks,

            ];

        });
    }

    public function headings(): array
    {
        return [

            'Student Name',
            'Roll No',
            'Subject',
            'Max Marks',
            'Obtained Marks'

        ];
    }
}