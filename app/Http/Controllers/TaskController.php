<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Tampilkan task dalam satu todolist
    public function index($todolist_id)
    {
        $todolist = Todolist::where('user_id', auth()->id())
            ->findOrFail($todolist_id);

        $tasks = Task::where('todolist_id', $todolist_id)->get();

        return view('task.index', compact('todolist', 'tasks'));
    }

    // Form tambah task
    public function create($todolist_id)
    {
        $todolist = Todolist::where('user_id', auth()->id())
            ->findOrFail($todolist_id);

        return view('task.create', compact('todolist'));
    }

    // Simpan task
    public function store(Request $request, $todolistId)
{
    $request->validate([
        'judul_task' => 'required',
        'description' => 'nullable',
    ]);

    Task::create([
        'todolist_id' => $todolistId,
        'judul_task' => $request->judul_task,
        'description' => $request->description,
        'is_done' => $request->has('is_done'),
    ]);

    return redirect()->route('task.index', $todolistId);
}

    // Form edit task
    public function edit($todolist_id, $task_id)
    {
        $todolist = Todolist::where('user_id', auth()->id())
            ->findOrFail($todolist_id);

        $task = Task::where('todolist_id', $todolist_id)
            ->findOrFail($task_id);

        return view('task.edit', compact('todolist', 'task'));
    }

    // Update task
    public function update(Request $request, $todolistId, $taskId)
{
    $task = Task::findOrFail($taskId);

    $task->update([
        'judul_task' => $request->judul_task,
        'description' => $request->description,
        'is_done' => $request->has('is_done'),
    ]);

    return redirect()->route('task.index', $todolistId);
}


    // Hapus task
    public function destroy($todolist_id, $task_id)
    {
        $task = Task::where('todolist_id', $todolist_id)
            ->findOrFail($task_id);

        $task->delete();

        return redirect()->route('task.index', $todolist_id)
            ->with('success', 'Task berhasil dihapus');
    }
}
