<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100 text-gray-800">
    <div class="container mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-green-600 mb-6">Create Account</h1>

        @include('components.alerts')

        
        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="role" class="block font-semibold mb-1">Role</label>
                <select id="role" name="role" class="w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" required>
                    <option value="" disabled selected>Select role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
             </div>

            <div>
                <label for="name" class="block font-semibold mb-1">Full Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter your full name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password" class="block font-semibold mb-1">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter your password" required>
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold mb-1">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">
                Register
            </button>
        </form>

        <p class="text-center text-sm mt-6">
            Already have an account?
            <a href="/" class="text-green-600 font-semibold hover:underline">Login here</a>
        </p>
    </div>

   
</body>
</html>
