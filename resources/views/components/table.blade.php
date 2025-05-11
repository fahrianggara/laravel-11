@props([
    'headers' => [],
])

<div class="relative overflow-x-auto rounded-lg">
    <table {{ $attributes->merge(['class' => 'w-full text-sm text-left rtl:text-right text-gray-500 ']) }}>
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="px-6 py-3">
                        {{ is_array($header) ? $header['label'] ?? '' : $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
