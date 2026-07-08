<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Models\Student;
use App\Models\Result;


class DashboardController extends Controller
{
      public function index()
{
    if(auth()->user()->role === 'admin')
    {
        $totalUsers = User::count();

        $totalAdmins = User::where('role', 'admin')->count();

        $totalNotices = Notice::count();

        $totalStudents = Student::count();

        $totalResults = Result::count();

        $recentNotices = Notice::latest()
                        ->take(5)
                        ->get();

        return view('admin.dashboard', compact(

    'totalUsers',
    'totalAdmins',
    'totalNotices',
    'totalStudents',
    'totalResults',
    'recentNotices'

        ));
    }

    return view('user.dashboard');
}
}
