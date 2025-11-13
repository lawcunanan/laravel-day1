<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center text-gray-800">
    <div class="container mx-auto mt-10 bg-white p-6 rounded-xl shadow-lg max-w-xl">
        <h1 class="text-3xl font-bold text-center text-green-600 mb-6">My Todo List</h1>

        {{-- Add Todo Form --}}
        <form  action="{{ route('addTasks.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block font-semibold mb-1">Title</label>
                <input type="text" id="title" name="TaskTitle" class="w-full border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter task title" required>
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea id="description" name="TaskDescription" class="w-full border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" rows="3" placeholder="Enter task description"></textarea>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">Add Task</button>
        </form>  
        <a href="/taskShow" class="inline-block  text-green-600  mt-6">
             View Tasks
        </a>
    </div>
</body>
</html>
