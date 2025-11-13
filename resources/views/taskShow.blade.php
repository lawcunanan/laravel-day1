<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen flex items-center justify-center text-gray-800">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-5xl">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-extrabold text-green-600">Task List</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Welcome, <span class="font-semibold text-green-700">{{ Auth::user()->name }}</span>!
                </p>
            </div>

            <div class="space-x-4 flex items-center">
                <a href="/home" 
                   class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                    + Add Task
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="overflow-x-auto">
            @if($tasks->isEmpty())
                <p class="text-center text-gray-500 py-6">You currently have no tasks. Click <span class="font-semibold text-green-600">+ Add Task</span> to create one.</p>
            @else
                <table class="w-full border-collapse rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-green-500 text-white">
                            <th class="py-3 px-4 text-left">Task Title</th>
                            <th class="py-3 px-4 text-left">Task Description</th>
                            <th class="py-3 px-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-green-50">
                        @foreach ($tasks as $task)
                            <tr class="border-b border-green-200 hover:bg-green-100 transition">
                                <td class="py-3 px-4 font-medium">{{ $task->TaskTitle }}</td>
                                <td class="py-3 px-4">{{ $task->TaskDescription }}</td>
                                <td class="py-3 px-4 text-center">
                                    <a href="{{ route('editTask.edit', $task) }}" 
                                       class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-lg shadow-sm transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('updateTasks.status', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-lg ml-2 shadow-sm transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

</body>
</html>
