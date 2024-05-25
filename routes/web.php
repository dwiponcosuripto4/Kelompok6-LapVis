<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Resource
    Route::resource('todo', TodoController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);

    // Route Resources
    // Route::resources([
    //     'todo' => TodoController::class,
    //     'user' => UserController::class,
    //     'category' => CategoryController::class,
    // ]);

    // Todo Routes
    // Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    // Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
    // Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    // Route::get('/todo/edit', [TodoController::class, 'edit'])->name('todo.edit');
    // Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    // Route::patch('/todo/{todo}', [TodoController::class, 'update'])->name('todo.update');
    // Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::patch('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::patch('/todo/{todo}/incomplete', [TodoController::class, 'uncomplete'])->name('todo.uncomplete');
    Route::delete('/todo', [TodoController::class, 'destroyCompleted'])->name('todo.deleteallcompleted');

    // User Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
        Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
    });
});

require __DIR__.'/auth.php';
