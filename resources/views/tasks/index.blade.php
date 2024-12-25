<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">My Tasks</h1>

        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">
            + Add New Task
        </a>

        @if($tasks->isEmpty())
            <p class="text-gray-500">No tasks available. Create your first task!</p>
        @else
            <table class="w-full border-collapse border border-gray-300 mt-4">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Title</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $task->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $task->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($task->status) }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 mr-2">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>