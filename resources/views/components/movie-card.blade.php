@props(['movie'])

@php
    $title = $movie['title'] ?? $movie['name'] ?? 'Untitled';
    $poster = $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : '';
    $match = isset($movie['vote_average']) ? round($movie['vote_average'] * 10) . '%' : 'N/A';
    $year = $movie['release_date'] ?? $movie['first_air_date'] ?? '';
    $year = $year ? explode('-', $year)[0] : '—';
@endphp

<div
    x-data="{ hovered: false }"
    @mouseenter="hovered = true"
    @mouseleave="hovered = false"
    class="relative min-w-[200px] md:min-w-[250px]  cursor-pointer transition-transform duration-300 hover:scale-110 hover:z-20"
>
    @if ($poster)
        <img src="{{ $poster }}" alt="{{ $title }}"
             class="w-full h-[288px] md:h-[364px] object-cover rounded-md" />
    @endif

    {{-- Hover Overlay --}}
    <div
        x-show="hovered"
        x-transition.opacity
        class="absolute inset-0 bg-black/80 rounded-md p-8 flex flex-col justify-end"
    >
        <h3 class="text-white font-semibold text-sm mb-1 line-clamp-2">{{ $title }}</h3>
        <div class="flex items-center space-x-2 text-xs text-gray-300 mb-2">
            <span class="text-green-400 font-semibold">{{ $match }} Match</span>
            <span>{{ $year }}</span>
        </div>
        <div class="flex space-x-2">
            {{-- Play --}}
            <button class="w-8 h-8 bg-white rounded-full flex items-center justify-center hover:bg-gray-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M5 3v18l15-9-15-9z"/>
                </svg>
            </button>

            {{-- Add --}}
            <button class="w-8 h-8 border border-white text-white rounded-full flex items-center justify-center hover:bg-white hover:text-black transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
            </button>
        </div>
    </div>
</div>
