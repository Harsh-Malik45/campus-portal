<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;

class DashboardController extends Controller
{
     public function index()
{
    if(auth()->user()->role === 'admin')
    {
        $totalUsers = User::count();

        $totalAdmins = User::where('role', 'admin')->count();

        $totalNormalUsers = User::where('role', 'user')->count();

        $totalNotices = Notice::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalNormalUsers',
            'totalNotices'
        ));
    }

    return view('user.dashboard');
}
}
