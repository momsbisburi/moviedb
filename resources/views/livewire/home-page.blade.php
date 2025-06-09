<div>
    <section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Trending Movies</h2>
        <div class="grid grid-cols-3 xl:grid-cols-12 gap-4">
            @foreach($trendingMovies as $movie)
                <a class="rounded overflow-hidden hover:scale-105 transition" href="{{ route('media.detail', ['type' => 'movie', 'id' => $movie['id']]) }}">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                         class="rounded-lg shadow-lg">
                    <p class="mt-2">{{ $movie['title'] }}</p>
                </a>
            @endforeach
        </div>
    </section>
    <section>
        <h2 class="text-2xl font-bold mb-4">Trending Series</h2>
        <div class="grid grid-cols-3 xl:grid-cols-12 gap-4">
            @foreach($trendingSeries as $tv)
                <a href="{{ route('media.detail', ['type' => 'tv', 'id' => $tv['id']]) }}">
                    <img src="https://image.tmdb.org/t/p/w500{{ $tv['poster_path'] }}"
                         class="rounded-lg shadow-lg">
                    <p class="mt-2">{{ $tv['name']  }}</p>
                </a>
            @endforeach
        </div>
    </section>
    <section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Popular Movies</h2>
        <div class="grid grid-cols-3 xl:grid-cols-12 gap-4">
            @foreach($movies as $movie)
                <a href="{{ route('media.detail', ['type' => 'movie', 'id' => $movie['id']]) }}">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                         class="rounded-lg shadow-lg">
                    <p class="mt-2">{{ $movie['title'] ??  $movie['name'] }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <section>
        <h2 class="text-2xl font-bold mb-4">Popular Series</h2>
        <div class="grid grid-cols-3 xl:grid-cols-12 gap-4">
            @foreach($series as $tv)
                <a href="{{ route('media.detail', ['type' => 'tv', 'id' => $tv['id']]) }}">
                    <img src="https://image.tmdb.org/t/p/w500{{ $tv['poster_path'] }}"
                         class="rounded-lg shadow-lg">
                    <p class="mt-2">{{ $tv['name'] ?? $tv['title'] }}</p>
                </a>
            @endforeach
        </div>
    </section>

</div>
