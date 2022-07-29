<?php

namespace App\Http\Controllers;

use App\Models\User as U;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index (Request $request)
    {
        $users = match ($request->sort)
        {
            'asc' => U::orderBy('name', 'asc')->get(),
            'desc' => U::orderBy('name', 'desc')->get(),
            default => U::all()
        };
        return view('user.index', ['users'=> $users]);
    }

    public function create ()
    {
        return view('user.create');
    }

    public function store (Request $request)
    {
        $user = new U;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('uc_create')->with('success', 'New user created!');
    }

    public function show(int $vartotojaId)
    {
        $vartotojaId= U::where('id', $vartotojaId)->first();
        return view('user.show', ['user' => $vartotojaId]);
    }

    public function destroy(U $user)
    {
        $user->delete();

        return redirect()->route('uc_index')->with('success', 'User deleted');
    }
}
