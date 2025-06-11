<?php
namespace App\Livewire;

use App\Services\TmdbService;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MovieModal extends Component
{
    public $movie;
    public $details = [];
    public $type = 'movie';
    public $trailerKey = null;


    public function redirectToPlayback()
    {
        return redirect()->route('watch', [
            'type' => $this->type,
            'id' => $this->movie['id']
        ]);
    }
    public function mount($movie,  TmdbService $tmdb)
    {
        $this->movie = $movie;
        $this->type = $movie['media_type'] ?? 'movie';
        $this->details = $tmdb->getMovie($movie['id']);

        $trailers = collect($tmdb->getMovieVideos($movie['id'])['results'] ?? []);
        $youtubeTrailer = $trailers->first(fn($vid) =>
            $vid['site'] === 'YouTube' && $vid['type'] === 'Trailer'
        );

        if ($youtubeTrailer) {
            $this->trailerKey = $youtubeTrailer['key'];
        }
    }


    public function render()
    {
        return view('livewire.movie-modal');
    }
}

