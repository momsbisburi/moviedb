<nav x-data="{ searchOpen: false }" class="bg-black bg-opacity-75 text-white px-6 sm:px-12 py-4 fixed w-full top-0 z-50">
    <div class="flex justify-between items-center">
        {{-- Left: Logo + Links --}}
        <div class="flex items-center space-x-6">
            <a href="/" class="text-red-600 text-2xl font-bold">DUPEFLIX</a>
            <a href="/" class="text-sm hover:text-gray-300">Home</a>
            <a href="/tv" class="text-sm hover:text-gray-300">TV Shows</a>
            <a href="/movies" class="text-sm hover:text-gray-300">Movies</a>
            <a href="/my-list" class="text-sm hover:text-gray-300">My List</a>
        </div>

        {{-- Right: Search Button --}}
        <div class="flex items-center space-x-4">
            <button @click="searchOpen = !searchOpen" class="hover:text-red-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Search Bar (Below Nav) --}}
    <div x-show="searchOpen" x-transition class="bg-black px-6 sm:px-12 py-3">
        <form method="GET" action="{{ route('search') }}" class="flex flex-col sm:flex-row gap-2">
            <input
                name="query"
                type="text"
                required
                placeholder="Search for movies or TV shows..."
                class="w-full px-4 py-2 rounded-md bg-gray-800 text-white border border-gray-600 placeholder-gray-400"
            />
            <button
                type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md"
            >
                Search
            </button>
        </form>
    </div>
</nav>
