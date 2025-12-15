<!DOCTYPE html>
<html>
<head>
    <title>Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 min-h-screen p-10">

<div class="max-w-4xl mx-auto">
   <div class="flex justify-between items-center mb-6">
    <div>
        

        <h1 class="text-2xl font-bold text-pink-600 mt-2">
            {{ $todolist->nama_list }}
        </h1>

        <p class="text-gray-500">
            {{ $todolist->description }}
        </p>

        <a href="{{ route('todolist.index') }}"
           class="text-pink-600 hover:underline">
            ← Kembali ke List
        </a>
    </div>

    <a href="{{ route('task.create', $todolist->id) }}"
       class="bg-pink-500 text-white px-4 py-2 rounded-lg">
        + Tambah Task
    </a>
</div>


    <div class="bg-white rounded-xl shadow p-6">
        @foreach ($tasks as $task)
            <div class="flex justify-between items-center border-b py-3">
                <div>
                    <p class="font-semibold {{ $task->is_done ? 'line-through text-gray-400' : '' }}">
                        {{ $task->judul_task }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $task->description }}
                    </p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('task.edit', [$todolist->id, $task->id]) }}"
                       class="bg-yellow-400 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form method="POST"
                          action="{{ route('task.delete', [$todolist->id, $task->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
