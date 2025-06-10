<div class="space-y-4 px-4">
    <livewire:header  />
    <div class="pt-32"></div>
    @foreach([
        'Trending Now' => $trending,
        'Popular Movies' => $popular,
        'Top Rated' => $topRated,
    ] as $title => $list)

        <section class="px-4 sm:px-8">
            <h2 class="text-xl sm:text-2xl font-bold mb-4">{{ $title }}</h2>
            <div class="dragscroll flex space-x-3 overflow-x-auto whitespace-nowrap scrollbar-hide cursor-grab select-none pb-2">
                @foreach($list as $movie)
                    <div class="relative group w-[150px] h-[250px] xl:w-[150px] xl:h-[250px] 2xl:w-[250px] 2xl:h-[450px] inline-block bg-gray-700 rounded-md overflow-hidden flex-shrink-0">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="object-cover w-full h-full">
                        <a href="{{ route('media.detail', ['type' => 'movie', 'id' => $movie['id']]) }}" class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center text-sm">
                            <button class="bg-white text-black  px-4 py-2 rounded font-bold">PLAY</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
</div>
