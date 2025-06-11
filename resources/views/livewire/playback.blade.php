<div class="min-h-screen bg-black text-white flex flex-col">
    {{-- Header --}}
    <div class="flex justify-between items-center px-4 py-3 bg-gradient-to-b from-black/90 to-transparent sticky top-0 z-50">
        <a href="{{ url()->previous() }}" class="text-sm bg-black/60 px-3 py-1 rounded hover:bg-black/80">
            ← Exit
        </a>
        <h1 class="text-base sm:text-lg font-semibold truncate">
            {{ $media['title'] ?? $media['name'] }}
        </h1>
        <div></div>
    </div>

    {{-- Player --}}
    <div class="flex-grow px-4 sm:px-8 pb-4">
        <div class="aspect-video w-full rounded-lg overflow-hidden shadow-lg">
            @if($imdbId)
                <iframe class="w-full h-[calc(100%-200px)]" src="{{ $this->getEmbedUrl() }}" frameborder="0" allowfullscreen></iframe>
            @else
                <p class="text-center text-gray-400 py-10">IMDb ID not found.</p>
            @endif
        </div>
    </div>

    {{-- Episode Selector --}}
    @if($type === 'tv' && count($seasons) > 0)
        <div class="bg-gray-900 px-4 sm:px-8 py-4">
            <label class="block mb-2 text-sm font-medium">Season</label>
            <select wire:model="selectedSeason" wire:change="loadEpisodes($event.target.value)" class="bg-black border border-gray-700 text-white px-4 py-2 rounded">
                @foreach($seasons as $season)
                    <option value="{{ $season['season_number'] }}">
                        Season {{ $season['season_number'] }} ({{ $season['episode_count'] }} Episodes)
                    </option>
                @endforeach
            </select>

            <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($episodes as $ep)
                    <button wire:key="ep-{{ $selectedSeason }}-{{ $ep['episode_number'] }}"
                            wire:click="$set('selectedEpisode', {{ $ep['episode_number'] }})"
                            class="bg-gray-800 p-3 rounded hover:bg-gray-700 transition">
                        <p class="font-bold">Ep {{ $ep['episode_number'] }}: {{ $ep['name'] }}</p>
                        <p class="text-sm text-gray-400">{{ Str::limit($ep['overview'], 100) }}</p>
                    </button>
                @endforeach
            </div>
        </div>
    @endif
</div>
