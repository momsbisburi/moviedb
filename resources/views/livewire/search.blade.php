<div class="min-h-screen bg-black text-white px-4 md:px-16 pt-24">

    <h1 class="text-2xl md:text-3xl font-bold mb-6">Search Results for "{{ $query }}"</h1>

    @if (empty($results))
        <p class="text-gray-400">No results found.</p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ($results as $item)
                @if (isset($item['poster_path']))
                    <div wire:click="showModal(@js($item))">
                        <x-movie-card :movie="$item" />
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    @if ($selectedMovie)
        @livewire('movie-modal', ['movie' => $selectedMovie], key($selectedMovie['id']))
    @endif
</div>
