<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Clone</title>
    <meta name="description" content="DupeFlix">
    <meta name="author" content="DupeFlix">

    <meta property="og:title" content="Netflix Clone">
    <meta property="og:description" content="A pixel-perfect Netflix clone built with Livewire and Tailwind CSS">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://lovable.dev/opengraph-image-p98pqg.png">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@lovable_dev">
    <meta name="twitter:image" content="https://lovable.dev/opengraph-image-p98pqg.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-black text-white">

{{-- Main content --}}
{{ $slot }}

@livewireScripts
</body>
</html>
