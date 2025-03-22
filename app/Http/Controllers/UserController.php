<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $users = User::where('id', '!=', $request->user()->id)->get();

        return Inertia::render('Settings/User',
        [
            'users' => $users,
        ]);

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return to_route('user.index');

    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8', // Make password optional
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->update();

        return to_route('user.index');
    }


    public function destroy(User $user)
    {

        $user->delete();

        return to_route('user.index');

    }

}
