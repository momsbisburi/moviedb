<div class="min-h-screen bg-black">


    @livewire('banner', ['movie' => $trendingMovies[0]])

    <div class="relative -mt-32 z-10 space-y-10">
        @livewire('movie-row', ['title' => 'Trending Now', 'movies' => $trendingMovies])
        @livewire('movie-row', ['title' => 'Top Rated', 'movies' => $topRatedMovies])
        @livewire('movie-row', ['title' => 'Now Playing', 'movies' => $nowPlayingMovies])
    </div>

    @if ($selectedMovie)
        @livewire('movie-modal', ['movie' => $selectedMovie], key($selectedMovie['id']))
    @endif

</div>
