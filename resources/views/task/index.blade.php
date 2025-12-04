<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 min-h-screen">

    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-pink-600 mb-6">
            Tasks dari: {{ $todolist->title }}
        </h1>

        <a href="{{ route('task.create', $todolist->id) }}"
           class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg shadow transition">
            + Tambah Task
        </a>

        <a href="{{ route('todolist.index') }}"
           class="ml-4 text-pink-600 font-semibold">Kembali ke List</a>

        <div class="mt-6 bg-white p-6 rounded-xl shadow">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">Nama Task</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="border-b">
                            <td class="py-3">{{ $task->name }}</td>
                            <td>
                                <span class="px-3 py-1 rounded-lg 
                                    {{ $task->status == 'done' ? 'bg-green-300' : 'bg-yellow-300' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>

                            <td class="py-3 flex gap-2">
                                <a href="{{ route('task.edit', [$todolist->id, $task->id]) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg">
                                    Edit
                                </a>

                                <form action="{{ route('task.delete', [$todolist->id, $task->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg"
                                        onclick="return confirm('Hapus task ini?')">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
