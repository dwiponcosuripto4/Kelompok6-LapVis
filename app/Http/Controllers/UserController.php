<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::where('id', '!=', '1')
        //     ->orderBy('name')
        // ->paginate(10);
        // ->simplePaginate(10);

        $search = request('search');
        if ($search) {
            $users = User::with('todos')->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
                ->where('id', '!=', '1')
                ->orderBy('name')
                ->paginate(20)
                // ->simplePaginate(10)
                ->withQueryString();
        } else {
            $users = User::with('todos')->where('id', '!=', '1')
                ->orderBy('name')
                ->paginate(10);
            // ->simplePaginate(10);
            // ->cursorPaginate(10);
        }

        // dd($users->toArray());
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id != 1) {
            $user->delete();

            // return back()->with('success', 'Delete user successfully!');
            return back()->with('success', $user->name.' - Delete user successfully!');
        } else {
            return redirect()->route('user.index')->with('danger', 'Delete user failed!');
        }
    }

    public function makeadmin(User $user)
    {
        $user->timestamps = false;
        $user->is_admin = true;
        $user->save();

        // return back()->with('success', 'Make admin successfully!');
        return back()->with('success', $user->name.' - Make admin successfully!');
    }

    public function removeadmin(User $user)
    {
        if ($user->id != 1) {
            $user->timestamps = false;
            $user->is_admin = false;
            $user->save();

            // return back()->with('success', 'Remove admin successfully!');
            return back()->with('success', $user->name.' - Remove admin successfully!');
        } else {
            return redirect()->route('user.index')->with('danger', 'Remove admin failed!');
        }
    }
}
