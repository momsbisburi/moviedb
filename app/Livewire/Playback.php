<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\TmdbService;

class Playback extends Component
{
    public $type;
    public $id;
    public $media;
    public $imdbId;

    public $seasons = [];
    public $episodes = [];

    public $selectedSeason = 1;
    public $selectedEpisode = 1;

    public function mount($type, $id)
    {
        $this->type = $type;
        $this->id = $id;

        $tmdb = app(TmdbService::class);

        if ($type === 'movie') {
            $this->media = $tmdb->get("/movie/{$id}", ['append_to_response' => 'external_ids']);
            $this->imdbId = $this->media['external_ids']['imdb_id'] ?? null;
        } else {
            $this->media = $tmdb->get("/tv/{$id}", ['append_to_response' => 'external_ids']);
            $this->imdbId = $this->media['external_ids']['imdb_id'] ?? null;
            $this->seasons = $this->media['seasons'] ?? [];

            if (count($this->seasons) > 0) {
                $this->selectedSeason = 1;
                $this->loadEpisodes($this->selectedSeason);
            }
        }
    }

    public function updatedSelectedSeason($value)
    {
        $this->selectedEpisode = 1;
        $this->loadEpisodes($value);
    }

    public function loadEpisodes($seasonNumber)
    {
        $tmdb = app(TmdbService::class);
        $seasonData = $tmdb->get("/tv/{$this->id}/season/{$seasonNumber}");
        $this->episodes = $seasonData['episodes'] ?? [];
    }

    public function getEmbedUrl()
    {
        if (!$this->imdbId) return '';

        if ($this->type === 'movie') {
            return "https://vidsrc.xyz/embed/movie?imdb={$this->imdbId}";
        }

        return "https://vidsrc.xyz/embed/tv?imdb={$this->imdbId}&season={$this->selectedSeason}&episode={$this->selectedEpisode}";
    }

    public function render()
    {
        return view('livewire.playback')->layout('layouts.app');
    }
}
