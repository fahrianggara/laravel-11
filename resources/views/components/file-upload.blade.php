@props([
    'label' => 'Click to upload an image',
    'src' => null,
    'error' => null,
    'required' => false,
])

@php
    $model = collect($attributes->getAttributes())
        ->filter(fn($_, $key) => str_starts_with($key, 'wire:model'))
        ->keys()
        ->map(fn($key) => $attributes->get($key))
        ->first();

    $name = $model ? Str::afterLast($model, '.') : null;
@endphp

<div>
    <div class="w-full flex items-center justify-center bg-gray-100 rounded-lg p-2">
        <img src="{{ $src ?? 'https://placehold.co/600x400?text=No+Image' }}"
            alt="Preview Image"
            class="h-[100px] object-cover rounded-lg">
    </div>

    <div class="mt-2 text-sm">
        <label class="block text-sm font-medium mb-2 dark:text-white {{ $required ? 'required' : '' }}">
            {{ $label }}
        </label>

        <input id="{{ $name ? Str::slug($name) : 'file-upload' }}"
            type="file"
            accept="{{ $attributes->get('accept', 'image/*') }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->class([
                'mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100
                dark:file:bg-neutral-800 dark:file:text-neutral-400 dark:hover:file:bg-neutral-700'
            ]) }}
        />

        @if ($error)
            <p class="text-red-600 text-sm mt-2">{{ $error }}</p>
        @endif
    </div>
</div>
