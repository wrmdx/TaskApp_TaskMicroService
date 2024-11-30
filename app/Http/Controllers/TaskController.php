<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class TaskController extends Controller
{
    // Display a listing of the tasks
    public function index()
    {
        //$this->authorize('viewAny', Task::class);

        $tasks = Task::all();

        return response()->json([
            'success' => true,
            'data' => $tasks
        ]);
    }

    // Store a newly created task in storage
    public function store(StoreTaskRequest $request)
    {
        $projectId = $request->input('project_id');

        // Verify the project_id with the other backend
        $response = Http::get("http://localhost:8000/api/projects/{$projectId}");

        // If the project_id is invalid
        if ($response->status() !== 200) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid project_id provided.'
            ], 400);
        }

        // create the task since the project_id is valid
        $task = Task::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'data' => $task
        ], 201);
    }

    // Display the specified task
    public function show(Task $task)
    {
        //$this->authorize('view', $task);

        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    // Update the specified task in storage
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $projectId = $request->input('project_id');

        // Verify the project_id with the other backend running on port 8000
        $response = Http::get("http://localhost:8000/api/projects/{$projectId}");

        // If the project_id is invalid return an error response
        if ($response->status() !== 200) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid project_id provided.'
            ], 400);
        }

        // Proceed to update the task since the project_id is valid
        $task->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully',
            'data' => $task
        ]);
    }

    // Remove the specified task from storage
    public function destroy(Task $task)
    {
        //$this->authorize('delete', $task);

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
    }
}
