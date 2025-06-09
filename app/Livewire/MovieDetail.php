<?php

namespace App\Livewire;

use Livewire\Component;

class MovieDetail extends Component
{
    public $mediaType;
    public $mediaId;
    public $embedType = 'embed'; // embed | vid | auto

    public $media = [];
    public $seasons = [];
    public $selectedSeason = 1;
    public $selectedEpisode = 1;

    public function mount($type, $id)
    {
        $this->mediaType = $type;
        $this->mediaId = $id;
        $this->fetchMediaDetails();
    }

    public function setEmbedType($type)
    {
        $this->embedType = $type;
    }

    public function updatedSelectedSeason()
    {
        $this->selectedEpisode = 1;
    }

    public function fetchMediaDetails()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.tmdb.bearer'),
            'Accept' => 'application/json',
        ])->get("https://api.themoviedb.org/3/{$this->mediaType}/{$this->mediaId}", [
            'language' => 'en-US',
        ]);

        if ($response->successful()) {
            $this->media = $response->json();
            if ($this->mediaType === 'tv') {
                $this->seasons = $this->media['seasons'];
                $this->selectedSeason = $this->seasons[0]['season_number'] ?? 1;
                $this->selectedEpisode = 1;
            }
        }
    }

    public function render()
    {
        $embedUrl = match ($this->embedType) {
            'embed' => $this->buildEmbedUrl('embed.su'),
            'vid' => $this->buildEmbedUrl('vidlink.pro'),
            'auto' => $this->buildEmbedUrl('player.autoembed.cc'),
        };

        return view('livewire.media-detail', [
            'media' => $this->media,
            'embedUrl' => $embedUrl,
        ])->layout('layouts.app');
    }

    protected function buildEmbedUrl($provider)
    {
        $base = match ($provider) {
            'embed.su' => 'https://embed.su/embed',
            'vidlink.pro' => 'https://vidlink.pro',
            'player.autoembed.cc' => 'https://player.autoembed.cc/embed',
        };

        if ($this->mediaType === 'movie') {
            return "$base/movie/{$this->mediaId}";
        }

        return "$base/tv/{$this->mediaId}/{$this->selectedSeason}/{$this->selectedEpisode}";
    }
}
