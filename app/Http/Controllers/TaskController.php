<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 📘 READ
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // 🟢 CREATE
    public function create()
    {
        return view('tasks.create');
    }

    // 🟩 STORE
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'completed' => false,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index');
    }

    // ✏️ EDIT
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // 📝 UPDATE
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|string',
            'status' => 'required|string',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // 🗑️ DELETE
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    // 📋 show
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

}
