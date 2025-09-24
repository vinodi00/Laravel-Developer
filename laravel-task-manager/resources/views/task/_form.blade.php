@props(['task' => null])

@php
    $isEdit = (bool) $task;
@endphp

<div class="space-y-6">
    <div>
        <x-input-label for="title" value="Title" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                      :value="old('title', $task->title ?? '')" required autofocus />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" value="Description" />
        <textarea id="description" name="description" rows="4"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $task->description ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="status" value="Status" />
        <select id="status" name="status"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @foreach (['pending' => 'Pending', 'done' => 'Done'] as $val => $label)
                <option value="{{ $val }}" @selected(old('status', $task->status ?? 'pending') === $val)>{{ $label }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end gap-3">
        <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:underline">Cancel</a>
        <x-primary-button>{{ $isEdit ? 'Update' : 'Create' }}</x-primary-button>
    </div>
</div>
