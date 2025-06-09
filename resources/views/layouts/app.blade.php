<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Home' }}</title>
{{--    @vite('resources/css/app.css')--}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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
