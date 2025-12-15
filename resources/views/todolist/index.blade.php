<!DOCTYPE html>
<html>
<head>
    <title>Todolist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 min-h-screen p-10">

<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-pink-600">My Todolist</h1>

        <a href="{{ route('todolist.create') }}"
           class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-lg shadow">
            + Tambah List
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($lists as $list)
            <div class="bg-white p-6 rounded-2xl shadow">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $list->nama_list }}
                </h2>
                <p class="text-gray-500 mt-2">
                    {{ $list->description }}
                </p>

                <div class="flex gap-2 mt-4">
                    <a href="{{ route('task.index', $list->id) }}"
                       class="bg-blue-500 text-white px-3 py-1 rounded">
                        Tasks
                    </a>

                    <a href="{{ route('todolist.edit', $list->id) }}"
                       class="bg-yellow-400 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('todolist.delete', $list->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded"
                                onclick="return confirm('Hapus list ini?')">
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
