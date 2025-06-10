<div class="max-w-7xl mx-auto px-4 py-6 text-white">
    <livewire:header />
    <h1 class="text-3xl mt-24 font-bold mb-6">Search Results for "<span class="text-red-600">{{ $query }}</span>"</h1>

    @if(empty($results))
        <p class="text-gray-400 text-center text-lg mt-10">No results found.</p>
    @else
        <div class="grid grid-cols-2  md:grid-cols-3 xl:grid-cols-6 2xl:grid-cols-8 gap-4">
            @foreach($results as $item)
                <a href="{{ route('media.detail', ['type' => $item['media_type'], 'id' => $item['id']]) }}"
                   class="relative group rounded-md overflow-hidden cursor-pointer shadow-lg bg-gray-900 hover:shadow-2xl transition-shadow duration-300">

                    @if(isset($item['poster_path']))
                        <img
                            src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}"
                            alt="{{ $item['title'] ?? $item['name'] }}"
                            class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-300"
                        >
                    @else
                        <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    {{-- Overlay with Title on hover --}}
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-sm font-semibold truncate">
                            {{ $item['title'] ?? $item['name'] }}
                        </p>
                        <p class="text-xs text-gray-400 uppercase tracking-wide">
                            {{ ucfirst($item['media_type']) }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
