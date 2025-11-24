<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-white text-black font-sans">
    @include('components.alerts')
    
    <div class="container mx-auto mt-10 bg-gray-50 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Edit Task</h1>
        <form action="{{ route('updateTask', $task) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title" class="block font-semibold mb-1 text-sm">Title</label>
                <input type="text" id="title" name="TaskTitle" value="{{ old('TaskTitle', $task->TaskTitle) }}" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Enter task title" required>
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1 text-sm">Description</label>
                <textarea id="description" name="TaskDescription" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Enter task description">{{ old('TaskDescription', $task->TaskDescription) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white text-base py-2 rounded hover:bg-blue-700 transition flex items-center justify-center">Update Task</button>
        </form>
        <a href="/taskShow" class="text-center text-sm mt-6 text-blue-600 font-semibold hover:underline">
             View Tasks
        </a>
    </div>
</body>
</html>
