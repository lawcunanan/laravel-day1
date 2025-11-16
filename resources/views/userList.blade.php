<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen flex items-center justify-center text-gray-800 bg-gray-100">

    <div class="bg-white shadow-xl rounded-lg p-6 w-full max-w-5xl">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-blue-700">User List</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Welcome, <span class="font-semibold text-blue-800">{{ Auth::user()->name }}</span>!
                </p>
            </div>

            <div class="space-x-4 flex items-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white text-[14px] py-1 px-3 rounded-md shadow transition">
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
                <table class="w-full border-collapse rounded-md overflow-hidden">
                    <thead>
                        <tr class="bg-blue-700 text-white">
                            <th class="py-2 px-3 text-left text-sm">Role</th>
                            <th class="py-2 px-3 text-left text-sm">Name</th>
                            <th class="py-2 px-3 text-left text-sm">Email</th>
                            <th class="py-2 px-3 text-left text-sm">Tasks</th>
                            <th class="py-2 px-3 text-center text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-blue-50">
                        @foreach ($users as $user)
                            <tr class="border-b border-blue-200 hover:bg-blue-100 transition">
                                <td class="py-2 px-3 font-medium text-sm uppercase">{{ $user->role }}</td>
                                <td class="py-2 px-3 text-sm">{{ $user->name }}</td>
                                <td class="py-2 px-3 text-sm">{{ $user->email }}</td>
                                <td class="py-2 px-3 text-sm">
                                    @if($user->tasks->isNotEmpty())
                                        <ul class="list-disc list-inside text-gray-600">
                                            @foreach($user->tasks as $task)
                                                <li class="font-medium">
                                                    {{ $task->TaskTitle }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-gray-500">No tasks.</p>
                                    @endif
                                </td>
                                <td class="py-2 px-3 text-center">
                                @if($user->status === 'inactive')
                                    <form action="{{ route('statusUser', [$user, 'active']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="text-[12px] bg-blue-700 hover:bg-blue-800 text-white  py-1 px-2 rounded-md ml-2 shadow-sm transition">
                                            Activate
                                        </button>
                                    </form>
                                 @else
                                    <form action="{{ route('statusUser', [$user, 'inactive']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="text-[12px] bg-red-500 hover:bg-red-600 text-white  py-1 px-2 rounded-md ml-2 shadow-sm transition">
                                            Deactivate
                                        </button>
                                    </form>
                                    @endif
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
