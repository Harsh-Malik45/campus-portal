<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ResultsTemplateExport implements FromArray
{
    public function array(): array
    {
        return [

            [
                'roll_no',
                'subject',
                'max_marks',
                'obtained_marks'
            ]

        ];
    }
}