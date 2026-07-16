<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::where('name', 'LIKE', "%{$search}%")
            ->orWhere('roll_no', 'LIKE', "%{$search}%")
            ->orWhere('branch', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'student')
            ->whereDoesntHave('student')
            ->get();

        return view('students.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'roll_no' => 'required|string|unique:students,roll_no',
            'year' => 'required|integer|min:1|max:4',
            'semester' => 'required|integer|min:1|max:8',
            'branch' => 'required|string|max:100',
        ]);

        Student::create([
            'user_id' => $request->user_id,   // IMPORTANT
            'name' => $request->name,
            'roll_no' => $request->roll_no,
            'year' => $request->year,
            'semester' => $request->semester,
            'branch' => $request->branch,
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Student $student)
{
    $users = User::where('role', 'student')->get();

    return view('students.edit', compact('student', 'users'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'roll_no' => 'required|string|unique:students,roll_no,' . $student->id,
            'year' => 'required|integer|min:1|max:4',
            'semester' => 'required|integer|min:1|max:8',
            'branch' => 'required|string|max:100',
        ]);

        $student->update([
    'user_id'   => $request->user_id,
    'name'      => $request->name,
    'roll_no'   => $request->roll_no,
    'year'      => $request->year,
    'semester'  => $request->semester,
    'branch'    => $request->branch,
]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}