<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100 text-gray-800">
    <div class="container mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-green-600 mb-6">Welcome Back</h1>
        @include('components.alerts')

        {{-- Login Form --}}
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter your email" required>
            </div>

            <div>
                <label for="password" class="block font-semibold mb-1">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">
                Login
            </button>
        </form>

        <p class="text-center text-sm mt-6">
            Don’t have an account?
            <a href="/register" class="text-green-600 font-semibold hover:underline">Register here</a>
        </p>
    </div>
</body>
</html>
