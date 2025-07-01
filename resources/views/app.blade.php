<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tutorial Laravel 11' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @livewireStyles
    @livewireScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')
</head>

<body>
    <main class="container mx-auto max-w-6xl px-4 py-6">
        {{ $slot }}
    </main>

    <script src="{{ asset('assets/js/modal.js') }}"></script>

    @stack('js')
</body>

</html>
