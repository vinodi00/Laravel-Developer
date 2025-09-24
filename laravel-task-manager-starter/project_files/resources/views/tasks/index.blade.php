@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">+ New Task</a>
    </div>

    @if (session('status'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
    @endif

    <form method="GET" class="mb-4">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search tasks..." class="border rounded px-3 py-2 w-full">
    </form>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2">Title</th>
                    <th class="text-left px-4 py-2">Status</th>
                    <th class="text-left px-4 py-2">Created</th>
                    <th class="px-4 py-2 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $task->title }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-flex items-center rounded px-2 py-1 text-sm {{ $task->status === 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $task->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 text-right space-x-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-500">No tasks yet. Create your first one!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
