<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->search;

    $results = Result::with('student')
        ->when($search, function ($query) use ($search) {

            $query->where('subject', 'LIKE', "%{$search}%")
                  ->orWhereHas('student', function ($q) use ($search) {

                      $q->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('roll_no', 'LIKE', "%{$search}%");

                  });

        })
        ->latest()
        ->paginate(5);

    return view('results.index', compact('results'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $students = Student::orderBy('name')->get();

    return view('results.create', compact('students'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'student_id' => 'required|exists:students,id',

        'subject' => 'required|max:255',

        'max_marks' => 'required|integer|min:1',

        'obtained_marks' => 'required|integer|min:0',

    ]);

    if ($request->obtained_marks > $request->max_marks) {

        return back()
            ->withInput()
            ->with('error', 'Obtained marks cannot be greater than maximum marks.');

    }

    Result::create([

        'student_id' => $request->student_id,

        'subject' => $request->subject,

        'max_marks' => $request->max_marks,

        'obtained_marks' => $request->obtained_marks,

    ]);

    return redirect()
        ->route('results.index')
        ->with('success', 'Result added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        $students = Student::orderBy('name')->get();

    return view('results.edit', compact('result', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Result $result)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'subject' => 'required|max:255',
        'max_marks' => 'required|integer|min:1',
        'obtained_marks' => 'required|integer|min:0',
    ]);

    if ($request->obtained_marks > $request->max_marks) {
        return back()
            ->withInput()
            ->with('error', 'Obtained marks cannot be greater than maximum marks.');
    }

    $result->update([
        'student_id' => $request->student_id,
        'subject' => $request->subject,
        'max_marks' => $request->max_marks,
        'obtained_marks' => $request->obtained_marks,
    ]);

    return redirect()
        ->route('results.index')
        ->with('success', 'Result updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Result $result)
{
    $result->delete();

    return redirect()
        ->route('results.index')
        ->with('success', 'Result deleted successfully');
}
}
