<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // TAMPILKAN TASK DALAM 1 LIST
    public function index($todolist_id)
    {
        $todolist = Todolist::findOrFail($todolist_id);
        $tasks = Task::where('todolist_id', $todolist_id)->get();

        return view('task.index', compact('todolist', 'tasks'));
    }

    // FORM TAMBAH
    public function create($todolist_id)
    {
        $todolist = Todolist::findOrFail($todolist_id);
        return view('task.create', compact('todolist'));
    }

    // SIMPAN TASK
    public function store(Request $request, $todolist_id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        Task::create([
            'todolist_id' => $todolist_id,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('task.index', $todolist_id);
    }

    // FORM EDIT
    public function edit($todolist_id, $task_id)
    {
        $todolist = Todolist::findOrFail($todolist_id);
        $task = Task::findOrFail($task_id);

        return view('task.edit', compact('todolist', 'task'));
    }

    // UPDATE TASK
    public function update(Request $request, $todolist_id, $task_id)
    {
        $task = Task::findOrFail($task_id);

        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $task->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->route('task.index', $todolist_id);
    }

    // DELETE TASK
    public function destroy($todolist_id, $task_id)
    {
        Task::findOrFail($task_id)->delete();

        return redirect()->route('task.index', $todolist_id);
    }
}
