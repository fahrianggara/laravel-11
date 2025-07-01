@props([
    'type' => 'button',
    'variant' => 'primary', // primary, danger, secondary, success, etc
    'size' => 'md',          // sm, md, lg
    'disabled' => false,
])

@php
    $base = 'inline-flex items-center justify-center font-medium rounded-lg focus:outline-none transition';

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-5 py-3 text-base',
    ];

    $variants = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300',
        'success' => 'bg-green-600 text-white hover:bg-green-700',
    ];

    $computedClasses = implode(' ', [
        $base,
        $sizes[$size] ?? $sizes['md'],
        $variants[$variant] ?? $variants['primary'],
        $disabled ? 'opacity-50 cursor-not-allowed' : '',
    ]);
@endphp

<button
    type="{{ $type }}"
    @if($disabled) disabled @endif
    {{ $attributes->merge(['class' => $computedClasses]) }}
>
    {{ $slot }}
</button>
