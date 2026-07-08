<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'roll_no',
        'year',
        'semester',
        'branch',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}