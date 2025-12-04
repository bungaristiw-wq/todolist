<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 min-h-screen flex justify-center items-center">

    <div class="bg-white w-96 p-8 rounded-2xl shadow-xl">
        <h1 class="text-2xl font-bold text-center text-pink-600 mb-6">
            Edit Task
        </h1>

        <form method="POST" action="{{ route('task.update', [$todolist->id, $task->id]) }}">
            @csrf
            @method('PUT')

            <label class="font-semibold">Nama Task</label>
            <input type="text" name="name" value="{{ $task->name }}"
                   class="w-full px-3 py-2 border rounded-lg mt-1 mb-4 focus:ring-2 focus:ring-pink-300"
                   required>

            <label class="font-semibold">Status</label>
            <select name="status"
                    class="w-full px-3 py-2 border rounded-lg mt-1 mb-4 focus:ring-2 focus:ring-pink-300">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
            </select>

            <button
                class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg font-semibold transition">
                Update
            </button>
        </form>

        <a href="{{ route('task.index', $todolist->id) }}"
           class="block text-center mt-4 text-pink-600 font-semibold">
            Kembali
        </a>
    </div>

</body>
</html>
