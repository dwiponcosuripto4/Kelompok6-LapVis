<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can complete the todo.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function complete(User $user, Todo $todo)
    {
        // Only admin can complete a todo
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the todo.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Todo $todo)
    {
        // Only admin can delete a todo
        return $user->is_admin;
    }
}

