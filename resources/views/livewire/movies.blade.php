<div class="bg-black text-white min-h-screen px-4 md:px-8">


    <h1 class="text-3xl font-bold my-6">Movies</h1>

    @foreach ([['Now Playing', $nowPlaying], ['Popular', $popular], ['Top Rated', $topRated], ['Upcoming', $upcoming]] as [$title, $list])
        @livewire('movie-row', ['title' => $title, 'movies' => $list, 'onClickEmitTo' => 'movies'], key($title))
    @endforeach

    @if ($selectedMovie)
        @livewire('movie-modal', ['movie' => $selectedMovie])
    @endif
</div>
