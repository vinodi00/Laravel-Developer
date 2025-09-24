<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Task Details</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg space-y-4">
                <div class="text-sm text-gray-500">Created: {{ $task->created_at->toDayDateTimeString() }}</div>
                <h3 class="text-2xl font-semibold">{{ $task->title }}</h3>
                @if($task->description)
                    <p class="text-gray-700">{{ $task->description }}</p>
                @endif
                <div>
                    <span class="px-2 py-1 text-xs rounded
                        {{ $task->status === 'done' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </div>
                <div class="pt-4">
                    <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:underline mr-4">Edit</a>
                    <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:underline">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
