<div class="relative">
    <input
        wire:model.debounce.500ms="query"
        type="text"
        placeholder="Search for movies or TV shows..."
        class="w-full bg-gray-800 border border-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none"
    />

    @if (!empty($results))
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
            @foreach ($results as $item)
                @if (isset($item['poster_path']))
                    <div wire:click="$parent.showModal(@js($movie))">
                        <x-movie-card :movie="$movie" />
                    </div>
                @endif
            @endforeach
        </div>
    @elseif(strlen($query) >= 2)
        <p class="text-gray-400 mt-2">No results found.</p>
    @endif
</div>
