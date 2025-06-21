<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KG2JP8S8NB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-KG2JP8S8NB');
    </script>
    <meta charset="UTF-8">
    <title>{{ $title ?? "DupeFlix" }}</title>
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
