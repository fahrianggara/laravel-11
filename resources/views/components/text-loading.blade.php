@props([
    'iconColor' => 'text-white',
])

<div>
    <div wire:loading>
        <svg class="animate-spin h-5 w-5 {{ $iconColor }} mx-auto mb-0" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2.93 6.343A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3.93-1.595z"></path>
        </svg>
    </div>

    <div wire:loading.remove {{ $attributes->merge(['class' => '']) }}>
        {!! $text !!}
    </div>
</div>
