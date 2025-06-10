<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieFlix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-black text-white">
{{$slot}}

<script src="https://cdn.jsdelivr.net/npm/dragscroll/dragscroll.min.js"></script>

<script>
    const scrollContainer = document.querySelector('.scroll-container');
    let isDown = false;
    let startX;
    let scrollLeft;

    scrollContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        scrollContainer.classList.add('cursor-grabbing');
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
    });
    scrollContainer.addEventListener('mouseleave', () => {
        isDown = false;
        scrollContainer.classList.remove('cursor-grabbing');
    });
    scrollContainer.addEventListener('mouseup', () => {
        isDown = false;
        scrollContainer.classList.remove('cursor-grabbing');
    });
    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = (x - startX) * 2; // scroll speed
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
</script>
@livewireScripts
</body>
</html>
