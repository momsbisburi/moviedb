<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MediaDetail extends Component
{
    public $mediaType;
    public $mediaId;
    public $embedType = 'vid'; // embed | vid | auto

    public $media = [];
    public $seasons = [];
    public $selectedSeason = 1;
    public $selectedEpisode = 1;

    // Store external IDs (especially imdb_id for TV shows)
    public $externalIds = [];

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
               // dd($this->media['seasons']);
                $this->seasons = $this->media['seasons'];
                $this->selectedSeason =  1;
                $this->selectedEpisode = 1;

                // Fetch external IDs (for IMDb ID)
                $externalResponse = Http::withHeaders([
                    'Authorization' => 'Bearer ' . config('services.tmdb.bearer'),
                    'Accept' => 'application/json',
                ])->get("https://api.themoviedb.org/3/tv/{$this->mediaId}/external_ids");

                if ($externalResponse->successful()) {
                    $this->externalIds = $externalResponse->json();
                }
            }
        }
    }

    public function render()
    {
        $embedUrl = match ($this->embedType) {
            'vid' => $this->buildEmbedUrl('vidlink.pro'),
            'embed' => $this->buildEmbedUrl('embed.su'),
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
            'vidlink.pro' => 'https://vidsrc.icu/embed',
            'embed.su' => 'https://embed.su/embed',
            'player.autoembed.cc' => 'https://player.autoembed.cc/embed',
        };

        if ($this->mediaType === 'movie') {
            return "$base/movie/{$this->mediaId}";
        }

        // Use IMDb ID for TV, fallback to TMDb ID if not found
        $id = $this->externalIds['imdb_id'] ?? $this->mediaId;
        //dd($id);
        if($provider=="vidlink.pro"){
            return "https://vidsrc.xyz/embed/tv?imdb={$id}&season={$this->selectedSeason}&episode={$this->selectedEpisode}";
        }

        return "$base/tv/{$id}/{$this->selectedSeason}/{$this->selectedEpisode}";
    }
}
