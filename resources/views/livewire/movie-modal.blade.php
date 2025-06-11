
<div x-data="{ open: true, showPlayer: false }"
     x-init="$nextTick(() => { showPlayer = false })"
     x-show="open"
     @keydown.escape.window="open = false"
     @click.outside="open = false"
     x-on:close-modal.window="open = false"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 text-white overflow-y-auto"
     style="backdrop-filter: blur(2px);">

    {{-- Modal Content --}}
    <div class="relative z-10 w-full max-w-5xl mx-auto bg-black rounded-lg overflow-hidden shadow-lg mt-10 mb-10"
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @hide-player.window="showPlayer = false">

        {{-- Image or Player --}}
        <div class="relative h-[400px] w-full">
            <template x-if="!showPlayer">
                <img src="https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}"
                     alt="{{ $movie['title'] ?? $movie['name'] }}"
                     class="absolute inset-0 w-full h-full object-cover">
            </template>

            <template x-if="showPlayer">
                <iframe
                    class="absolute inset-0 w-full h-full"
                    src="https://www.youtube.com/embed/{{ $trailerKey }}?autoplay=1&controls=1"
                    title="YouTube trailer"
                    frameborder="0"
                    allow="autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </template>

            {{-- Gradient Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent z-10"></div>

            {{-- Close Button --}}
            <button @click="open = false; showPlayer = false"
                    class="absolute top-4 right-4 z-20 w-10 h-10 bg-black/60 rounded-full flex items-center justify-center hover:bg-black transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- Title & Play --}}
            <div class="absolute bottom-6 left-6 right-6 z-20">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">
                    {{ $movie['title'] ?? $movie['name'] }}
                </h1>

                <div class="flex flex-wrap gap-3">
                    <button wire:click="redirectToPlayback"
                            class="flex items-center gap-2 bg-white text-black px-6 py-2 rounded hover:bg-gray-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" fill="currentColor"
                             viewBox="0 0 24 24"><path d="M5 3v18l15-9-15-9z"/></svg>
                        <span>Play</span>
                    </button>
                    @if ($trailerKey)

                        <button @click="showPlayer = true"
                                class="flex items-center gap-2 bg-gray-700 text-white px-6 py-2 rounded hover:bg-gray-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor"
                                 viewBox="0 0 24 24"><path d="M5 3v18l15-9-15-9z"/></svg>
                            <span>Trailer</span>
                        </button>

                    @endif

                    <button class="flex items-center gap-2 bg-gray-700 text-white px-6 py-2 rounded hover:bg-gray-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                             stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>My List</span>
                    </button>
                </div>
            </div>
        </div>


        {{-- Info Section --}}
        <div class="p-6 md:p-8 text-sm md:text-base bg-black">
            <div class="flex flex-wrap items-center gap-4 text-gray-400 mb-4">
                <span class="text-green-400 font-semibold">{{ round($movie['vote_average'] * 10) }}% Match</span>

                @if ($movie['release_date'] ?? $movie['first_air_date'])
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'] ?? $movie['first_air_date'])->year }}</span>
                @endif

                @if (!empty($details['runtime']))
                    <span>{{ intdiv($details['runtime'], 60) }}h {{ $details['runtime'] % 60 }}m</span>
                @endif

                <span class="border border-gray-500 px-2 py-0.5 text-xs">HD</span>
            </div>

            <p class="text-white leading-relaxed mb-4">{{ $movie['overview'] }}</p>

            <div class="text-gray-400 space-y-2">
                @if (!empty($details['genres']))
                    <div><span class="text-white">Genres:</span> {{ collect($details['genres'])->pluck('name')->join(', ') }}</div>
                @endif
                <div><span class="text-white">Language:</span> {{ strtoupper($movie['original_language']) }}</div>
                <div><span class="text-white">Rating:</span> {{ number_format($movie['vote_average'], 1) }}/10</div>
            </div>
        </div>
    </div>
</div>
