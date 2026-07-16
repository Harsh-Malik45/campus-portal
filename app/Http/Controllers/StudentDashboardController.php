<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Notice;
use App\Models\Result;

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

    public function results()
{
    $student = Student::where('user_id', auth()->id())->first();

    if (!$student) {
        return redirect()->route('students.dashboard');
    }

    $results = Result::where('student_id', $student->id)->get();

    return view('students.results', compact('student', 'results'));
}
}