<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Todolist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 min-h-screen flex justify-center items-center">

    <div class="bg-white w-96 p-8 rounded-2xl shadow-xl">
        <h1 class="text-2xl font-bold text-center text-pink-600 mb-6">Edit List</h1>

        <form method="POST" action="{{ route('todolist.update', $todolist->id) }}">
            @csrf
            @method('PUT')

            <label class="font-semibold">Judul</label>
            <input type="text" name="title" value="{{ $todolist->title }}"
                   class="w-full px-3 py-2 border rounded-lg mt-1 mb-4 focus:ring-2 focus:ring-pink-300"
                   required>

            <label class="font-semibold">Deskripsi</label>
            <textarea name="description"
                      class="w-full px-3 py-2 border rounded-lg mt-1 mb-4 focus:ring-2 focus:ring-pink-300">{{ $todolist->description }}</textarea>

            <button
                class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg font-semibold transition">
                Update
            </button>
        </form>

        <a href="{{ route('todolist.index') }}"
           class="block text-center mt-4 text-pink-600 font-semibold">
            Kembali
        </a>
    </div>

</body>
</html>
