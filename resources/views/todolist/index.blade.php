<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todolist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 min-h-screen">

    <div class="container mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-pink-600">My Todolist</h1>

            <a href="{{ route('todolist.create') }}"
               class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg shadow transition">
                + Tambah List
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($lists as $list)
                <div class="bg-white p-5 rounded-xl shadow">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $list->title }}</h2>
                    <p class="text-gray-600 mt-2 mb-4">{{ $list->description }}</p>

                    <div class="flex gap-2">
                        <a href="{{ route('todolist.edit', $list->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg transition">
                            Edit
                        </a>

                        <form action="{{ route('todolist.delete', $list->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg transition"
                                onclick="return confirm('Hapus list ini?')">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('task.index', $list->id) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg transition">
                            Tasks
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</body>
</html>
