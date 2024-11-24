<?php


namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determine whether the user can view any tasks.
     */
    public function viewAny(User $user)
    {
        return true; // Allow viewing all tasks
    }

    /**
     * Determine whether the user can view the task.
     */
    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id; // Ensure the user owns the task
    }

    /**
     * Determine whether the user can create tasks.
     */
    public function create(User $user)
    {
        return true; // Allow all authenticated users to create tasks
    }

    /**
     * Determine whether the user can update the task.
     */
    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id; // Ensure the user owns the task
    }

    /**
     * Determine whether the user can delete the task.
     */
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id; // Ensure the user owns the task
    }
}
