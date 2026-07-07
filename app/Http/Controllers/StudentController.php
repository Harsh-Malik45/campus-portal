<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $students = Student::latest()->paginate(5);

    return view('students.index', compact('students'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('students.create');

    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'roll_no' => 'required|unique:students',
        'year' => 'required|integer|min:1|max:4',
        'semester' => 'required|integer|min:1|max:8',
        'branch' => 'required|max:100',
    ]);

    Student::create([
        'name' => $request->name,
        'roll_no' => $request->roll_no,
        'year' => $request->year,
        'semester' => $request->semester,
        'branch' => $request->branch,
    ]);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
