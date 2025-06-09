<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    protected $base;
    protected $bearer;

    public function __construct()
    {
        $this->base = config('services.tmdb.base_uri');
        $this->bearer = config('services.tmdb.bearer');
    }
    protected function getEmbedAvailableTmdbIds(string $type = 'movie'): array
    {
        $url = "https://embed.su/list/{$type}.json";

        return cache()->remember("embed_{$type}_tmdb_ids", now()->addHours(2), function () use ($url) {
            $response = Http::timeout(10)->get($url);

            if (!$response->successful()) {
                return [];
            }

            return collect($response->json())
                ->pluck('tmdb')
                ->filter()
                ->unique()
                ->values()
                ->toArray();
        });
    }
    public function getPopular($type = 'movie')
    {
        $results = [];

        // 1. Get available TMDB IDs from embed.su
        $availableTmdbIds = $this->getEmbedAvailableTmdbIds($type);

        // 2. Fetch from TMDB (3 pages = 60 max)
        for ($page = 1; $page <= 3; $page++) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->bearer,
                'Accept' => 'application/json',
            ])->get("{$this->base}{$type}/popular", [
                'language' => 'en-US',
                'page' => $page,
            ]);

            $data = $response->json()['results'] ?? [];

            // 3. Filter only results that exist in embed.su
            $filtered = array_filter($data, function ($item) use ($availableTmdbIds) {
                return !empty($item['poster_path']) && in_array($item['id'], $availableTmdbIds);
            });

            $results = array_merge($results, $filtered);
        }

        return $results;
    }

    public function getTrending($type = 'movie')
    {
        $availableTmdbIds = $this->getEmbedAvailableTmdbIds($type);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->bearer,
            'Accept' => 'application/json',
        ])->get("{$this->base}trending/{$type}/day", [
            'language' => 'en-US',
        ]);

        $results = $response->json()['results'] ?? [];

        return array_filter($results, function ($item) use ($availableTmdbIds) {
            return !empty($item['poster_path']) && in_array($item['id'], $availableTmdbIds);
        });
    }

    public function getImdbIdForTv($tvId)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.tmdb.bearer'),
            'Accept' => 'application/json',
        ])->get("https://api.themoviedb.org/3/tv/{$tvId}/external_ids");

        return $response->json()['imdb_id'] ?? null;
    }
}
