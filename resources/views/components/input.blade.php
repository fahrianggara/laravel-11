@props([
    'label' => null,
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'error' => null,
])

@php
    // Get the first wire:model attribute
    $model = collect($attributes->getAttributes())
        ->filter(fn($_, $key) => str_starts_with($key, 'wire:model'))
        ->keys()->map(fn($key) => $attributes->get($key))->first();

    // Extract the name from the model
    $name = $model ? Str::afterLast($model, '.') : null;
    $id = $name ? Str::slug($name) : null;
@endphp

<div>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium mb-2 dark:text-white
            {{ $required ? 'required' : '' }}">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input
            id="{{ $id }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            min="{{ $type === 'number' ? 0 : null }}"
            max="{{ $type === 'number' ? 999999 : null }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->class([
                'py-2.5 px-4 block w-full outline-none rounded-lg sm:text-sm dark:bg-neutral-800 dark:text-neutral-400 border',
                $error
                    ? 'border-red-500 focus:ring-2 focus:border-red-500 focus:ring-red-500 dark:border-red-500'
                    : 'border-gray-300  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:border-neutral-700',
            ]) }}
        />

        @if ($error)
            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" x2="12" y1="8" y2="12"></line>
                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                </svg>
            </div>
        @endif
    </div>

    @if ($error)
        <p class="text-sm text-red-600 mt-2">{{ $error }}</p>
    @endif
</div>
