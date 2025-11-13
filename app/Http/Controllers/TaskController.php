<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest; 
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
   
    public function index()
    {
        $tasks = Task::where('TaskStatus', 'incomplete')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('taskShow', compact('tasks'));
    }

    public function getAllTasksJson(string $status)
    {
        $tasks = Task::where('TaskStatus', $status)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $tasks
        ]);
    }

    
    public function edit(Task $task)
    {
        return view('editTask', compact('task'));
    }

   
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();
        $validated['TaskStatus'] = 'incomplete';
        $validated['user_id'] = Auth::id();
        
        Task::create($validated);

        return redirect()->route('showTasks.index')
            ->with('success', 'Task created successfully.');
    }

   
    public function update(UpdateTaskRequest $request, Task $task)
    {
       $validated = $request->validated();
        $task->update($validated);

        return redirect()->route('showTasks.index')
            ->with('success', 'Task updated successfully.');
    }

   
    public function updateStatus(Task $task)
    {
        $task->update(['TaskStatus' => 'completed']);

        return redirect()->route('showTasks.index')
            ->with('success', 'Task status updated successfully.');
    }

}
