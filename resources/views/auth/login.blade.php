<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-96">
        <h1 class="text-2xl font-bold text-center text-pink-600 mb-6">Login</h1>

        @if (session('error'))
            <p class="text-red-500 text-sm mb-3">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <label class="block mb-2 font-semibold text-gray-700">Email</label>
            <input type="email" name="email"
                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-pink-300 mb-4"
                   required>

            <label class="block mb-2 font-semibold text-gray-700">Password</label>
            <input type="password" name="password"
                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-pink-300 mb-4"
                   required>

            <button
                class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg font-semibold transition">
                Login
            </button>
        </form>

        <p class="text-center text-sm mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-pink-600 font-semibold">Register</a>
        </p>
    </div>

</body>
</html>
