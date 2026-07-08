<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'student_id',
        'subject',
        'max_marks',
        'obtained_marks',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
