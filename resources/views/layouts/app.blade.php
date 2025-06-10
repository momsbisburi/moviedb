<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Home' }}</title>
{{--    @vite('resources/css/app.css')--}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @livewireStyles
</head>
<body class="bg-gray-900 text-white">
<header class="p-4 bg-gray-800 text-xl"><a href="/">MyFlix</a></header>
<livewire:search-bar />
<main class="p-6">
    {{ $slot }}
</main>
@livewireScripts
</body>
</html>
