<div>
    <header class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-b from-black">
        <div class="flex flex-row justify-between items-center sm:items-center px-4 sm:px-8 py-4 gap-2 sm:gap-0">
            <a href="{{route('home')}}">  <img src="/images/logo.png" class="w-24 xl:w-[200px]"></a>

            <div class="flex flex-wrap gap-3 sm:space-x-4">
                <a href="{{route('home')}}" class="text-white hover:underline text-sm">Home</a>
                <a href="{{route('series.browse')}}" class="text-white hover:underline text-sm">TV Shows</a>
                <a href="{{route('movies')}}" class="text-white hover:underline text-sm">Movies</a>
            </div>
            <livewire:search-bar />
        </div>
    </header>

</div>
