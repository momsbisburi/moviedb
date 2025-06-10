<div class="relative w-full h-screen bg-black text-white flex flex-col">

    {{-- Header / Top Bar --}}
    <div class="flex justify-between items-center px-4 py-3 bg-gradient-to-b from-black/90 to-transparent sticky top-0 z-50">
        <button onclick="history.back()" class="text-sm bg-black/60 px-3 py-1 rounded hover:bg-black/80">
            ← Exit
        </button>
        <h1 class="text-base sm:text-lg font-semibold truncate">
{{--            {{ $movieTitle }}--}}
        </h1>
        <div></div>
    </div>

    {{-- Player --}}
    <div class="flex-grow px-4 sm:px-8 pb-4">
        <div class="w-full h-[calc(100vh-220px)] rounded-md overflow-hidden scrollbar-hide">
            <iframe
                src="{{ $embedUrl }}"
                frameborder="0"
                allowfullscreen
                class="w-full h-full rounded-md"
            ></iframe>
        </div>
    </div>

    {{-- Embed Source Buttons --}}
    <div class="flex flex-wrap justify-center gap-2 px-4 pb-6">
{{--        <button wire:click="setEmbedType('vidcloud')" class="{{ $embedType === 'vidcloud' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">--}}
{{--            Vidcloud--}}
{{--        </button>--}}
        <button wire:click="setEmbedType('embed')" class="{{ $embedType === 'embed' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">
            Embed.su
        </button>
        <button wire:click="setEmbedType('vid')" class="{{ $embedType === 'vid' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">
            Vidlink.pro
        </button>
        <button wire:click="setEmbedType('auto')" class="{{ $embedType === 'auto' ? 'bg-red-600' : 'bg-gray-700' }} text-white px-4 py-2 rounded">
            AutoEmbed.cc
        </button>
    </div>

</div>
