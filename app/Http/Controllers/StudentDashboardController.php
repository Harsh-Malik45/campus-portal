<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Notice;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Student::where(
            'user_id',
            auth()->id()
        )->first();

        $recentNotices = Notice::latest()
                                ->take(5)
                                ->get();

        return view(
            'students.dashboard',
            compact(
                'student',
                'recentNotices'
            )
        );
    }

    public function profile()
    {
        $student = Student::where(
            'user_id',
            auth()->id()
        )->first();

        return view(
            'students.profile',
            compact('student')
        );
    }
}