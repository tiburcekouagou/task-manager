<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white p-4 rounded-md shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-medium">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}"
                    class="w-full border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium">Description</label>
                <textarea name="description" id="description"
                    class="w-full border-gray-300 rounded-md p-2">{{ $task->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded-md p-2">
                    <option value="pending" @if($task->status === 'pending') selected @endif>Pending</option>
                    <option value="completed" @if($task->status === 'completed') selected @endif>Completed</option>
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">
                Update Task
            </button>
        </form>

        <a href="{{ route('tasks.index') }}" class="text-blue-500 mt-4 inline-block">← Back to Task List</a>
    </div>
</x-app-layout>