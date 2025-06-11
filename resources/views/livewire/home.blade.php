<div>
    <livewire:header />
    <section class="pt-32 px-4 sm:px-8">
        <h2 class="text-xl sm:text-2xl font-bold mb-4">Trending Movies</h2>
        <div class="dragscroll flex space-x-3 overflow-x-auto whitespace-nowrap scrollbar-hide cursor-grab select-none pb-2">
            @foreach($trendingMovies as $movie)
                <div class="relative group w-[150px] h-[250px] xl:w-[150px] xl:h-[250px] 2xl:w-[250px] 2xl:h-[450px] inline-block bg-gray-700 rounded-md overflow-hidden flex-shrink-0">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="object-cover w-full h-full">
                    <a href="{{ route('media.detail', ['type' => 'movie', 'id' => $movie['id']]) }}" class="absolute inset-0  bg-black/70 opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col items-center justify-center text-sm">
                        <button class="bg-white text-black  px-4 py-2 rounded font-bold">PLAY</button>
                        <p class="text-sm font-semibold truncate">
                            {{ $movie['title'] ?? $movie['name'] }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="pt-4 px-4 sm:px-8">
        <h2 class="text-xl sm:text-2xl font-bold mb-4">Trending Series</h2>
        <div class="dragscroll flex space-x-3 overflow-x-auto whitespace-nowrap scrollbar-hide cursor-grab select-none pb-2">
            @foreach($trendingSeries as $tv)
                <div class="relative group w-[150px] h-[250px] xl:w-[150px] xl:h-[250px] 2xl:w-[250px] 2xl:h-[450px] inline-block bg-gray-700 rounded-md overflow-hidden flex-shrink-0">
                    <img src="https://image.tmdb.org/t/p/w500{{ $tv['poster_path'] }}" class="object-cover w-full h-full">
                    <a href="{{ route('media.detail', ['type' => 'tv', 'id' => $tv['id']]) }}" class="absolute flex-col inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center text-sm">
                        <button class="bg-white text-black  px-4 py-2 rounded font-bold">PLAY</button>
                        <p class="text-sm font-semibold truncate">
                            {{ $tv['title'] ?? $tv['name'] }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>



    <section class="pt-4 px-4 sm:px-8">
        <h2 class="text-xl sm:text-2xl font-bold mb-4">Popular Movies</h2>
        <div class="dragscroll flex space-x-3 overflow-x-auto whitespace-nowrap scrollbar-hide cursor-grab select-none pb-2">
            @foreach($movies as $movie)
                <div class="relative group w-[150px] h-[250px] xl:w-[150px] xl:h-[250px] 2xl:w-[250px] 2xl:h-[450px] inline-block bg-gray-700 rounded-md overflow-hidden flex-shrink-0">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="object-cover w-full h-full">
                    <a href="{{ route('media.detail', ['type' => 'movie', 'id' => $movie['id']]) }}" class="absolute flex-col inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center text-sm">
                        <button class="bg-white text-black  px-4 py-2 rounded font-bold">PLAY</button>
                        <p class="text-sm font-semibold truncate">
                            {{ $movie['title'] ?? $movie['name'] }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="pt-4 px-4 sm:px-8">
        <h2 class="text-xl sm:text-2xl font-bold mb-4">Popular Series</h2>
        <div class="dragscroll flex space-x-3 overflow-x-auto whitespace-nowrap scrollbar-hide cursor-grab select-none pb-2">
            @foreach($series as $tv)
                <div class="relative group w-[150px] h-[250px] xl:w-[150px] xl:h-[250px] 2xl:w-[250px] 2xl:h-[450px] inline-block bg-gray-700 rounded-md overflow-hidden flex-shrink-0">
                    <img src="https://image.tmdb.org/t/p/w500{{ $tv['poster_path'] }}" class="object-cover w-full h-full">
                    <a href="{{ route('media.detail', ['type' => 'movie', 'id' => $tv['id']]) }}" class="absolute inset-0 flex-col bg-black/70 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center text-sm">
                        <button class="bg-white text-black  px-4 py-2 rounded font-bold">PLAY</button>
                        <p class="text-sm font-semibold truncate">
                            {{ $tv['title'] ?? $tv['name'] }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</div>
