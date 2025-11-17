<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-white text-black font-sans">
    @include('components.alerts')

    <div class="container mx-auto my-10 bg-gray-50 p-8 rounded-lg shadow-lg w-full max-w-5xl">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-blue-600">User List</h1>
                <p class="text-gray-600 text-sm mt-1">
                    A list of all the users in your account.
                </p>
            </div>

            <div class="space-x-4 flex items-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white text-base py-2 px-4 rounded-md shadow-md transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto">
            @if($users->isEmpty())
                <p class="text-center text-gray-500 py-4">No users found.</p>
            @else
                <div class="overflow-hidden rounded-lg border border-gray-200">
                    <table class="min-w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left text-sm font-semibold">Role</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold">Name</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold">Email</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold">Tasks</th>
                                <th class="py-3 px-4 text-center text-sm font-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="py-3 px-4 font-medium text-sm capitalize-first">{{ $user->role }}</td>
                                    <td class="py-3 px-4 text-sm">{{ $user->name }}</td>
                                    <td class="py-3 px-4 text-sm">{{ $user->email }}</td>
                                    <td class="py-3 px-4 text-sm">
                                        <ul class="list-disc list-inside">
                                            @if($user->tasks->isNotEmpty())
                                                @foreach($user->tasks as $task)
                                                    <li class="font-medium">
                                                        {{ $task->TaskTitle }}
                                                    </li>
                                                @endforeach
                                            @else
                                                <p class="text-gray-500">No tasks.</p>
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        @if($user->status === 'inactive')
                                            <form action="{{ route('statusUser', [$user, 'active']) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="text-sm bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md shadow-sm transition">
                                                    Activate
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('statusUser', [$user, 'inactive']) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="text-sm bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md shadow-sm transition">
                                                    Deactivate
                                                </button>
                                            </form>
                                        @endif
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
