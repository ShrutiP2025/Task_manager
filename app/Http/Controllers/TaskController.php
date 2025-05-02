<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                        ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'sometimes' // Optional validation
        ]);
    
        // Convert checkbox value to boolean
        $validated['completed'] = $request->has('completed');
    
        $task->update($validated);
    
        return redirect()->route('tasks.index')
                        ->with('success', 'Task updated successfully.');
    }
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                        ->with('success', 'Task deleted successfully.');
    }
}
?>