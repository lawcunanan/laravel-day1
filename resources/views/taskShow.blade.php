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
                <h1 class="text-2xl font-bold text-blue-700">Task List</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Welcome, <span class="font-semibold text-blue-800">{{ Auth::user()->name }}</span>!
                </p>
            </div>

            <div class="space-x-4 flex items-center">
                <a href="/home" 
                   class="inline-block bg-blue-700 hover:bg-blue-800 text-white text-[14px] py-1 px-3 rounded-md shadow transition">
                    + Add Task
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white text-[14px] py-1 px-3 rounded-md shadow transition">
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
                <table class="w-full border-collapse rounded-md overflow-hidden">
                    <thead>
                        <tr class="bg-blue-700 text-white">
                            <th class="py-2 px-3 text-left text-sm">Task Title</th>
                            <th class="py-2 px-3 text-left text-sm">Task Description</th>
                            <th class="py-2 px-3 text-center text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-blue-50">
                        @foreach ($tasks as $task)
                            <tr class="border-b border-blue-200 hover:bg-blue-100 transition">
                                <td class="py-2 px-3 font-medium text-sm">{{ $task->TaskTitle }}</td>
                                <td class="py-2 px-3 text-sm">{{ $task->TaskDescription }}</td>
                                <td class="py-2 px-3 text-center">
                                    <a href="{{ route('editTask.edit', $task) }}" 
                                       class="bg-blue-700 hover:bg-blue-800 text-white text-[12px] py-1 px-2 rounded-md shadow-sm transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('updateTasks.status', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white text-[12px] py-1 px-2 rounded-md ml-2 shadow-sm transition">
                                            Mark as Done
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
