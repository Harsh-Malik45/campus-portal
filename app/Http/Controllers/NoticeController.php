<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display all notices
     */
    public function index(Request $request)
{
    $search = $request->search;

    $notices = Notice::where('title', 'LIKE', "%$search%")
                     ->latest()
                     ->paginate(5);

    return view('notices.index', compact('notices'));
}


    public function userNotices()
{
    $notices = Notice::latest()->get();

    return view('user.notices', compact('notices'));
}

    /**
     * Show create form
     */
    public function create()
    {
        return view('notices.create');
    }

    /**
     * Store notice in database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        Notice::create([
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('notices.index')
            ->with('success', 'Notice created successfully');
    }

    /**
     * Display single notice
     */
    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

    /**
     * Show edit form
     */
    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    /**
     * Update notice
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $notice->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('notices.index')
            ->with('success', 'Notice updated successfully');
    }

    /**
     * Delete notice
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();

        return redirect()
            ->route('notices.index')
            ->with('success', 'Notice deleted successfully');
    }

}