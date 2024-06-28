<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filterCompleted = $request->input('filter_completed');

        // Query untuk mengambil data Order yang terkait dengan Todo yang sudah complete
        $query = Order::with(['todo.user'])
        ->whereHas('todo', function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
            ->orWhere('user_id', 'like', '%' . $search . '%')
            ->where('is_complete', true); // Menyaring hanya Todo yang sudah complete
        });

        // Jika user bukan admin, tambahkan filter berdasarkan user_id
        if (!auth()->user()->can('admin')) {
        $query->whereHas('todo', function ($q) {
        $q->where('user_id', auth()->user()->id);
        });
        }


        // Tambahkan filter completed jika diset
        if ($filterCompleted) {
            $query->where('is_completed', true);
        }

        // Urutkan hasil berdasarkan is_completed dan created_at
        $orders = $query->orderBy('is_completed', 'asc')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $todos = Todo::where('user_id', auth()->user()->id)->get();

        return view('order.create', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo_id' => 'required|exists:todos,id',
            'description' => 'nullable|string',
        ]);

        $order = Order::create([
            'todo_id' => $request->todo_id,
            'description' => $request->description,
            'is_completed' => false,
            'user_id' => auth()->user()->id,
            'date' => now(), // Menambahkan nilai date
        ]);

        return redirect()->route('order.index')->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $todos = Todo::where('user_id', auth()->user()->id)->get();

        if (auth()->user()->id == $order->todo->user_id || auth()->user()->can('admin')) {
            return view('order.edit', compact('order', 'todos'));
        }

        return redirect()->route('order.index')->with('danger', 'You are not authorized to edit this order!');
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'todo_id' => 'required|exists:todos,id',
            'description' => 'nullable|string',
        ]);

        $order->update([
            'todo_id' => $request->todo_id,
            'description' => $request->description,
        ]);

        return redirect()->route('order.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        if (auth()->user()->id == $order->todo->user_id || auth()->user()->can('admin')) {
            $order->delete();

            return redirect()
                ->route('order.index')->with('success', 'Order deleted successfully!');
        }

        return redirect()->route('order.index')->with('danger', 'You are not authorized to delete this order!');
    }

    public function complete(Order $order)
    {
        if (auth()->user()->id == $order->todo->user_id || auth()->user()->can('admin')) {
            $order->update(['is_completed' => true]);

            return redirect()->route('order.index')->with('success', 'Order completed successfully!');
        }

        return redirect()->route('order.index')->with('danger', 'You are not authorized to complete this order!');
    }

    public function uncomplete(Order $order)
    {
        if (auth()->user()->id == $order->todo->user_id || auth()->user()->can('admin')) {
            $order->update(['is_completed' => false]);

            return redirect()->route('order.index')->with('success', 'Order uncompleted successfully!');
        }

        return redirect()->route('order.index')->with('danger', 'You are not authorized to uncomplete this order!');
    }
}
