<div class="relative w-full h-screen bg-black text-white flex flex-col">

    {{-- Header / Top Bar --}}
    <div class="flex justify-between items-center px-4 py-3 bg-gradient-to-b from-black/90 to-transparent sticky top-0 z-50">
        <button onclick="history.back()" class="text-sm bg-black/60 px-3 py-1 rounded hover:bg-black/80">
            ← Exit
        </button>
        <h1 class="text-base sm:text-lg font-semibold truncate">
            {{--            {{ $movieTitle }}--}}
        </h1>
        <div></div>
    </div>

    {{-- Player --}}
    <div class="flex-grow px-4 sm:px-8 pb-4">
        <div class="w-full h-[calc(100vh-220px)] rounded-md overflow-hidden scrollbar-hide">
            <iframe
                src="{{ $embedUrl }}"
                frameborder="0"
                allowfullscreen
                class="w-full h-full rounded-md"
            ></iframe>
        </div>
    </div>

    {{-- Embed Source Buttons --}}
    <div class="flex flex-wrap justify-center gap-2 px-4 pb-6">
        {{--        <button wire:click="setEmbedType('vidcloud')" class="{{ $embedType === 'vidcloud' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">--}}
        {{--            Vidcloud--}}
        {{--        </button>--}}
        <button wire:click="setEmbedType('embed')" class="{{ $embedType === 'embed' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">
            Embed.su
        </button>
        <button wire:click="setEmbedType('vid')" class="{{ $embedType === 'vid' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">
            Vidlink.pro
        </button>
        <button wire:click="setEmbedType('auto')" class="{{ $embedType === 'auto' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">
            AutoEmbed.cc
        </button>
    </div>
    @if ($mediaType === 'tv' && !empty($seasons))
        <div class="px-4 pb-6 text-white">
            {{-- Season Selector --}}
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Select Season</label>
                <select wire:model="selectedSeason"
                        class="bg-gray-800 text-white p-2 rounded w-full sm:w-60"
                >
                    @foreach ($seasons as $season)
                        <option value="{{ $season['season_number'] }}">Season {{ $season['season_number'] }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Episode Selector --}}
            @php
                $selected = collect($seasons)->firstWhere('season_number', $selectedSeason);
                $episodeCount = $selected['episode_count'] ?? 1;
            @endphp

            <div>
                <label class="block mb-1 text-sm font-semibold">Select Episode</label>
                <div class="grid grid-cols-4 sm:grid-cols-8 md:grid-cols-10 gap-2">
                    @for ($i = 1; $i <= $episodeCount; $i++)
                        <button wire:click="$set('selectedEpisode', {{ $i }})"
                                class="p-2 rounded text-sm
                            {{ $selectedEpisode === $i ? 'bg-red-600' : 'bg-gray-700 hover:bg-gray-600' }}"
                        >
                            {{ $i }}
                        </button>
                    @endfor
                </div>
            </div>
        </div>
    @endif
</div>
