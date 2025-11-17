<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-white text-black font-sans">
    @include('components.alerts')

    <div class="container mx-auto mt-10 bg-gray-50 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Welcome Back</h1>
       
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block font-semibold mb-1 text-sm">Email</label>
                <input type="email" id="email" name="email" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your email" required>
            </div>

            <div>
                <label for="password" class="block font-semibold mb-1 text-sm">Password</label>
                <input type="password" id="password" name="password" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white text-base py-2 rounded hover:bg-blue-700 transition flex items-center justify-center">
                Login
            </button>
        </form>

        <p class="text-center text-sm mt-6">
            Don’t have an account?
            <a href="/register" class="text-blue-600 font-semibold hover:underline">Register here</a>
        </p>
    </div>
    <x-footer owner="Lawrence Corp" />
</body>
</html>
