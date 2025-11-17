<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-white text-black font-sans">
     @include('components.alerts')

    <div class="container mx-auto mt-10 bg-gray-50 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Create Account</h1>
        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="role" class="block font-semibold mb-1 text-sm">Role</label>
                <select id="role" name="role" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="" disabled selected>Select role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
             </div>

            <div>
                <label for="name" class="block font-semibold mb-1 text-sm">Full Name</label>
                <input type="text" id="name" name="name" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your full name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1 text-sm">Email</label>
                <input type="email" id="email" name="email" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password" class="block font-semibold mb-1 text-sm">Password</label>
                <input type="password" id="password" name="password" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your password" required>
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold mb-1 text-sm">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white text-base py-2 rounded hover:bg-blue-700 transition flex items-center justify-center">
                Register
            </button>
        </form>

        <p class="text-center text-sm mt-6">
            Already have an account?
            <a href="/" class="text-blue-600 font-semibold hover:underline">Login here</a>
        </p>
    </div>

    <x-footer owner="Lawrence Corp" />
</body>
</html>
