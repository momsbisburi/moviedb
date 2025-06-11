@php
    $rowId = 'row-' . Str::slug($title);
@endphp

<div class="px-4 md:px-16 mb-8">
    <h2 class="text-white text-xl md:text-2xl font-semibold mb-4">{{ $title }}</h2>

    {{-- Arrows + Scrollable Row --}}
    <div class="relative group">

        {{-- Left Arrow --}}
        <button
            type="button"
            onclick="scrollRow('{{ $rowId }}', 'left')"
            class="absolute left-0 top-0 bottom-0 z-10 w-12 bg-black/50 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-black/80 hidden sm:flex items-center justify-center"
        >
            <span class="text-2xl">‹</span>
        </button>

        {{-- Right Arrow --}}
        <button
            type="button"
            onclick="scrollRow('{{ $rowId }}', 'right')"
            class="absolute right-0 top-0 bottom-0 z-10 w-12 bg-black/50 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-black/80 hidden sm:flex items-center justify-center"
        >
            <span class="text-2xl">›</span>
        </button>

        {{-- Scrollable Movie List --}}
        <div id="{{ $rowId }}" class="flex space-x-3 overflow-x-scroll scroll-smooth scrollbar-hide pr-4">
            @foreach ($movies as $movie)
                <div wire:click="$parent.showModal(@js($movie))">
                    <x-movie-card :movie="$movie" />
                </div>
            @endforeach
        </div>

    </div>
</div>

{{-- Scroll Script --}}
@once
    @push('scripts')
        <script>
            function scrollRow(rowId, direction) {
                const row = document.getElementById(rowId);
                if (row) {
                    const amount = direction === 'left' ? -400 : 400;
                    row.scrollBy({ left: amount, behavior: 'smooth' });
                }
            }
        </script>
    @endpush
@endonce
