<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-white text-black font-sans">
    @include('components.alerts')
    <div class="container mx-auto my-10 bg-gray-50 p-8 rounded-lg shadow-lg w-full max-w-5xl">
      
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-blue-600">Task List</h1>
                <p class="text-gray-600 text-sm mt-1">
                    A list of all the tasks in your account.
                </p>
            </div>

            <div class="space-x-4 flex items-center">
                <a href="/addTask" 
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-base py-2 px-4 rounded-md shadow-md transition">
                    + Add Task
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white text-base py-2 px-4 rounded-md shadow-md transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="overflow-x-auto">
            @if($tasks->isEmpty())
                <p class="text-center text-gray-500 py-6">You currently have no tasks. Click <a href="/addTask" class="font-semibold text-blue-600 hover:underline">+ Add Task</a> to create one.</p>
            @else
                <div class="overflow-hidden rounded-lg border border-gray-200">
                    <table class="min-w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left text-sm font-semibold">Task Title</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold">Task Description</th>
                                <th class="py-3 px-4 text-center text-sm font-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="py-3 px-4 font-medium text-sm">{{ $task->TaskTitle }}</td>
                                    <td class="py-3 px-4 text-sm">{{ $task->TaskDescription }}</td>
                                    <td class="py-3 px-4 text-center min-w-[250px]">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('viewEditTask', $task) }}" 
                                               class="bg-blue-600 hover:bg-blue-700 text-white text-sm py-1 px-3 rounded-md shadow-sm transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('updateTaskStatus', $task) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="bg-red-500 hover:bg-red-600 text-white text-sm py-1 px-3 rounded-md shadow-sm transition">
                                                    Mark as Done
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</body>
</html>
