<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Resource
    Route::resource('todo', TodoController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::get('/search-users', [TodoController::class, 'searchUsers'])->name('search.users');

    Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todo.edit');

    // Todo Routes
    Route::patch('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::patch('/todo/{todo}/incomplete', [TodoController::class, 'uncomplete'])->name('todo.uncomplete');
    Route::delete('/todo', [TodoController::class, 'destroyCompleted'])->name('todo.deleteallcompleted');

    // Order Routes
    Route::resource('order', OrderController::class)->except(['show']);
    Route::patch('/order/{order}/complete', [OrderController::class, 'complete'])->name('order.complete');
    Route::patch('/order/{order}/uncomplete', [OrderController::class, 'uncomplete'])->name('order.uncomplete');

    // User Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
        Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
    });
});

// Route::get('login/github', function () {
//     return Socialite::driver('github')->redirect();
// });

// Route::get('login/github/callback', function () {
//     $user = Socialite::driver('github')->user();

//     // $user->token
//     // Logic to log the user in or create a new user
// });

Route::get('login/github', [App\Http\Controllers\AuthController::class, 'redirectToGithub']);
Route::get('login/github/callback', [App\Http\Controllers\AuthController::class, 'handleGithubCallback']);

require __DIR__ . '/auth.php';
