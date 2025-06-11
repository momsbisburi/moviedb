<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TmdbService
{
    protected string $base = 'https://api.themoviedb.org/3';
    protected string $token;

    public function __construct()
    {
        $this->token = config('services.tmdb.key');
    }

    // ✅ Generic GET method with caching
    public function get(string $endpoint, array $params = [], int $ttl = 3600)
    {
        $cacheKey = 'tmdb_' . md5($endpoint . serialize($params));

        return Cache::remember($cacheKey, $ttl, function () use ($endpoint, $params) {
            return Http::withToken($this->token)
                ->acceptJson()
                ->get("{$this->base}{$endpoint}", $params)
                ->json();
        });
    }

    // ✅ Predefined shortcut methods
    public function getTrending(string $type = 'movie')
    {
        return $this->get("/trending/{$type}/day", ['language' => 'en-US']);
    }

    public function getMovie(int $id)
    {
        return $this->get("/movie/{$id}", ['language' => 'en-US']);
    }

    public function getMovieVideos(int $id)
    {
        return $this->get("/movie/{$id}/videos");
    }

    public function getTv(int $id)
    {
        return $this->get("/tv/{$id}", ['language' => 'en-US']);
    }

    public function search(string $query)
    {
        $query = trim($query);
        if ($query === '') return ['results' => []];

        return $this->get("/search/multi", ['query' => $query, 'language' => 'en-US'], 300);
    }

    public function flushMovieCache(int $id)
    {
        Cache::forget(md5("/movie/{$id}" . serialize(['language' => 'en-US'])));
        Cache::forget(md5("/movie/{$id}/videos" . serialize([])));
    }
}

