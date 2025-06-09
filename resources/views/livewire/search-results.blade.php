<div class="mx-auto p-4 text-white">
    <h1 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h1>

    @if (empty($results))
        <p>No results found.</p>
    @else
        <div class="grid grid-cols-3 xl:grid-cols-12 gap-4">
            @foreach ($results as $item)
                <a class="rounded overflow-hidden hover:scale-105 transition" href="{{ route('media.detail', ['type' => $item['media_type'], 'id' => $item['id']]) }}">
                    @if(isset($item['poster_path']))  <img src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}"
                         class="rounded-lg shadow-lg">
                    @endif
                    <p class="mt-2">{{ $item['title'] ?? $item['name'] }}</p>
                    <p class="text-xs text-gray-400">{{ ucfirst($item['media_type']) }}</p>
                </a>
{{--                <a href="{{ route('media.detail', ['type' => $item['media_type'], 'id' => $item['id']]) }}"--}}
{{--                   class="rounded shadow overflow-hidden hover:scale-105 transition">--}}

{{--                    @if(isset($item['poster_path']))--}}
{{--                        <img src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}" alt="" class="rounded-lg shadow-lg">--}}
{{--                    @endif--}}

{{--                    <div class="mt-2">--}}
{{--                        <h2 class="text-sm font-semibold">--}}
{{--                            {{ $item['title'] ?? $item['name'] }}--}}
{{--                        </h2>--}}
{{--                        <p class="text-xs text-gray-400">{{ ucfirst($item['media_type']) }}</p>--}}
{{--                    </div>--}}
{{--                </a>--}}
            @endforeach
        </div>
    @endif
</div>
