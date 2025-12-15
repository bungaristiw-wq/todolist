<!DOCTYPE html>
<html>
<head>
    <title>Tambah Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 min-h-screen flex items-center justify-center">

<div class="bg-white w-full max-w-md p-8 rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-pink-600 mb-6 text-center">
        Tambah Task
    </h1>

    <form method="POST" action="{{ route('task.store', $todolist->id) }}">
        @csrf

        <label class="font-semibold">Nama Task</label>
        <input type="text" name="judul_task"
               class="w-full border px-3 py-2 rounded mb-4" required>

        <label class="font-semibold">Deskripsi</label>
        <textarea name="description"
                  class="w-full border px-3 py-2 rounded mb-6"></textarea>
        <label class="flex items-center gap-2 mb-6">
    <input type="checkbox" name="is_done" value="0">
    Tandai selesai
</label>
          
        <button class="w-full bg-pink-500 text-white py-2 rounded-lg">
            Simpan
        </button>
        <a href="{{ url()->previous() }}"
   class="inline-block mb-4 text-pink-600 hover:underline">
    ← Kembali
</a>

    </form>
</div>

</body>
</html>
