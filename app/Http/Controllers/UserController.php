<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
         public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

       public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,user',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect()
        ->route('users.index')
        ->with('success', 'User updated successfully');
}




public function destroy(User $user)
{
    if(auth()->id() == $user->id)
    {
        return back()
            ->with('error',
                'You cannot delete your own account');
    }

    $user->delete();

    return redirect()
        ->route('users.index')
        ->with('success',
            'User deleted successfully');
}

}
