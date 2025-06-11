@php
    $background = $movie['backdrop_path'] ?? $movie['poster_path'] ?? '';
    $imageUrl = $background ? 'https://image.tmdb.org/t/p/original' . $background : '';
@endphp

<div class="relative h-[60vh] sm:h-[75vh] text-white">
    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent z-10"></div>

    @if ($imageUrl)
        <img src="{{ $imageUrl }}" alt="{{ $movie['title'] ?? 'Banner' }}"
             class="absolute inset-0 object-cover w-full h-full z-0">
    @endif

    <div class="relative z-20 px-6 sm:px-12 pt-24 sm:pt-40 max-w-3xl">
        <h1 class="text-3xl sm:text-5xl font-bold mb-4">{{ $movie['title'] ?? $movie['name'] }}</h1>
        <p class="text-sm sm:text-base text-gray-200 line-clamp-3 mb-6">
            {{ $movie['overview'] }}
        </p>
        <div class="space-x-4">
            <a href="#" class="bg-white text-black font-semibold py-2 px-6 rounded hover:bg-gray-300 transition">Play</a>
            <a href="#" class="bg-gray-600 text-white font-semibold py-2 px-6 rounded hover:bg-gray-500 transition">More Info</a>
        </div>
    </div>
</div>
