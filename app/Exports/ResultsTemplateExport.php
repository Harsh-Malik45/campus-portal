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
            ],

            [
                '223344',
                'DSA',
                100,
                95
            ],

            [
                '123211',
                'OS',
                100,
                76
            ]

        ];
    }
}