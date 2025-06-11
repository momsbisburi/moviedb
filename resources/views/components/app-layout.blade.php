<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Netflix Clone' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script defer src="//unpkg.com/alpinejs" ></script>
</head>
<body class="bg-black text-white">
@include('components.navbar')
{{ $slot }}
@livewireScripts
@stack('scripts')
</body>
</html>
