<div class=" mx-auto p-4 text-white">
    <div class="flex flex-col md:flex-row gap-6">

        <div class="w-full">
            <h1 class="text-3xl font-bold mb-2">{{ $media['title'] ?? $media['name'] }}</h1>

            <div class="flex gap-3 mb-4">
                <button wire:click="setEmbedType('vid')" class="{{ $embedType === 'vid' ? 'bg-blue-700' : 'bg-gray-700' }} px-3 py-1 rounded">Vidlink.pro</button>
                <button wire:click="setEmbedType('embed')" class="{{ $embedType === 'embed' ? 'bg-blue-700' : 'bg-gray-700' }} px-3 py-1 rounded">Embed.su</button>
                <button wire:click="setEmbedType('auto')" class="{{ $embedType === 'auto' ? 'bg-blue-700' : 'bg-gray-700' }} px-3 py-1 rounded">AutoEmbed</button>
            </div>




            <div class="h-[calc(100vh-300px)] w-full">
                <iframe src="{{ $embedUrl }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
            </div>

            @if ($mediaType === 'tv')
                <div class="flex gap-4 my-4 items-center">
                    <div>
                        <label class="block mb-1">Season</label>
                        <select wire:model="selectedSeason" class="text-black px-2 py-1 rounded">
                            @foreach ($seasons as $season)
                                <option value="{{ $season['season_number'] }}">
                                    {{ $season['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1">Episodes</label>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $episodesCount = collect($seasons)
                                    ->firstWhere('season_number', $selectedSeason)['episode_count'] ?? 1;
                            @endphp

                            @for ($i = 1; $i <= $episodesCount; $i++)
                                <button
                                    wire:click="$set('selectedEpisode', {{ $i }})"
                                    class="px-3 py-1 rounded
                    {{ $selectedEpisode === $i ? 'bg-blue-600 text-white' : 'bg-gray-200 text-black' }}
                    hover:bg-blue-500 hover:text-white transition"
                                >
                                    {{ $i }}
                                </button>
                            @endfor
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
