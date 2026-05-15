<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'Stadtverein') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-gray-50 text-gray-800">
    <x-layout.navigation />

    <main>
        {{ $slot }}
    </main>

    <x-layout.footer />

    @include('site.layout.lightbox')

    @stack('scripts')
</body>
</html>
