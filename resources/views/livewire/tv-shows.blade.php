<div class="bg-black text-white min-h-screen px-4 md:px-8">


    <h1 class="text-3xl font-bold my-6">TV Shows</h1>

    @foreach ([['Trending Now', $trending], ['Top Rated', $topRated], ['Airing Today', $airingToday]] as [$title, $list])
        @livewire('movie-row', ['title' => $title, 'movies' => $list, ], key($title))
    @endforeach

    @if ($selectedTv)
        @livewire('movie-modal', ['movie' => $selectedTv], key($selectedTv['id']))
    @endif
</div>
