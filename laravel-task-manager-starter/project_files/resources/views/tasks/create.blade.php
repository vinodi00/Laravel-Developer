@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">Create Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input name="title" value="{{ old('title') }}" class="border rounded w-full px-3 py-2" required>
            @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="4" class="border rounded w-full px-3 py-2">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="border rounded w-full px-3 py-2">
                <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ old('status') === 'done' ? 'selected' : '' }}>Done</option>
            </select>
            @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-end space-x-2">
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 rounded border">Cancel</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Create</button>
        </div>
    </form>
</div>
@endsection
