<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen flex items-center justify-center text-gray-800">

    <div class="bg-white shadow-xl rounded-lg p-6 w-full max-w-5xl">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-blue-700">Task List</h1>
                <p class="text-gray-600 text-base mt-1">
                    A list of all the tasks in your account including their name, role, email and so on.
                </p>
            </div>

            <div class="space-x-4 flex items-center">
                <a href="/home" 
                   class="inline-block bg-blue-700 hover:bg-blue-800 text-white text-[16px] py-1 px-3 rounded-md shadow transition">
                    + Add Task
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white text-[16px] py-1 px-3 rounded-md shadow transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="overflow-x-auto">
            @if($tasks->isEmpty())
                <p class="text-center text-gray-500 py-6">You currently have no tasks. Click <span class="font-semibold text-blue-700">+ Add Task</span> to create one.</p>
            @else
                <div class="overflow-hidden rounded-md border">
                    <table class="min-w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-3 text-left text-base">Task Title</th>
                                <th class="py-2 px-3 text-left text-base">Task Description</th>
                                <th class="py-2 px-3 text-center text-base">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="py-2 px-3 font-medium text-base">{{ $task->TaskTitle }}</td>
                                    <td class="py-2 px-3 text-base">{{ $task->TaskDescription }}</td>
                                    <td class="py-2 px-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('editTask.edit', $task) }}" 
                                               class="bg-blue-700 hover:bg-blue-800 text-white text-[14px] py-1 px-2 rounded-md shadow-sm transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('updateTasks.status', $task) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="bg-red-500 hover:bg-red-600 text-white text-[14px] py-1 px-2 rounded-md ml-2 shadow-sm transition">
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
