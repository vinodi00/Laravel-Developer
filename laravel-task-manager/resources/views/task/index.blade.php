<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-3 rounded bg-green-50 text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    + New Task
                </a>
            </div>

            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tasks as $task)
                        <tr>
                            <td class="px-6 py-4">
                                <a href="{{ route('tasks.show', $task) }}" class="text-indigo-700 hover:underline">
                                    {{ $task->title }}
                                </a>
                                @if($task->description)
                                    <div class="text-sm text-gray-500">{{ Str::limit($task->description, 100) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded
                                    {{ $task->status === 'done' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $task->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                            onclick="return confirm('Delete this task?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-8 text-center text-gray-500" colspan="4">
                                No tasks yet. Create your first one!
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
