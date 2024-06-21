<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $todos = Todo::where('user_id', auth()->id())->get();
        if (auth()->user()->can('admin')) {
            // Jika user adalah admin, tampilkan semua todo
            $todos = Todo::with(['category', 'user'])
                ->orderBy('is_complete', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Jika user bukan admin, tampilkan todo milik mereka sendiri
            $todos = Todo::with(['category', 'user'])->where('user_id', auth()->user()->id)
                ->orderBy('is_complete', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $todosCompleted = Todo::where('user_id', auth()->user()->id)
            ->where('is_complete', true)
            ->count();

        // dd($todos);
        // dd($todos->toArray());

        return view('todo.index', compact('todos', 'todosCompleted'));

        // return view('todo.index', [
        //     'todos' => $todos,
        // ]);
    }
    public function searchUsers(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name', 'like', '%' . $search . '%')->get();
        return response()->json($users);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('todo.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => [
                'nullable',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('user_id', auth()->user()->id);
                }),
            ],
            'user_id' => 'required|exists:users,id',
        ]);

        // Practical
        // $todo = new Todo;
        // $todo->title = $request->title;
        // $todo->user_id = auth()->user()->id;
        // $todo->save();

        // Query Builder way
        // DB::table('todos')->insert([
        //     'title' => $request->title,
        //     'user_id' => auth()->user()->id,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Eloquent Way - Readable
        $todo = Todo::create([
            'title' => ucfirst($request->title),
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        // Eloquent Way - Shortest
        // $request->user()->todos()->create($request->all());
        // $request->user()->todos()->create([
        //     'title' => ucfirst($request->title),
        // ]);

        // dd($todo);
        // dd($todo->toArray());

        return redirect()
            ->route('todo.index')
            ->with('success', 'Todo created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**public function edit(Todo $todo)
    {
        $categories = Category::where('user_id', auth()->user()->id)->get();

        if (auth()->user()->id == $todo->user_id) {
            return view('todo.edit', compact('todo', 'categories'));
        }

        return redirect()->route('todo.index')->with('danger', 'You are not authorized to edit this todo!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => [
                'nullable',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('user_id', auth()->user()->id);
                }),
            ],
        ]);

        // Practical
        // $todo->title = $request->title;
        // $todo->save();

        // Eloquent Way - Readable
        $todo->update([
            'title' => ucfirst($request->title),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('todo.index')->with('success', 'Todo updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if (auth()->user()->id == $todo->user_id) {
            $todo->delete();

            return redirect()
                ->route('todo.index')->with('success', 'Todo deleted successfully!');
        }

        return redirect()->route('todo.index')->with('danger', 'You are not authorized to delete this todo!');
    }

    public function destroyCompleted()
    {
        $todosCompleted = Todo::where('user_id', auth()->user()->id)
            ->where('is_complete', true)
            ->get();
        foreach ($todosCompleted as $todo) {
            $todo->delete();
        }

        return redirect()->route('todo.index')->with('success', 'All completed todos deleted successfully!');
    }

    public function complete(Todo $todo)
    {
        if (auth()->user()->id == $todo->user_id) {
            $todo->update([
                'is_complete' => true,
            ]);

            return redirect()->route('todo.index')->with('success', 'Todo completed successfully!');
        }

        return redirect()->route('todo.index')->with('danger', 'You are not authorized to complete this todo!');
    }

    public function uncomplete(Todo $todo)
    {
        if (auth()->user()->id == $todo->user_id) {
            $todo->update([
                'is_complete' => false,
            ]);

            return redirect()->route('todo.index')->with('success', 'Todo uncompleted successfully!');
        }

        return redirect()->route('todo.index')->with('danger', 'You are not authorized to uncomplete this todo!');
    }
}
