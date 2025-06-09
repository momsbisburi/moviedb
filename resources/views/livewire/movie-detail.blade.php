<div class="max-w-7xl mx-auto p-4">
    <div class="flex gap-4 mb-4">
        <button wire:click="setEmbedType('embed')" class="{{ $embedType === 'embed' ? 'bg-blue-600' : 'bg-gray-600' }} text-white px-4 py-2 rounded">
            Embed.su
        </button>
        <button wire:click="setEmbedType('vid')" class="{{ $embedType === 'vid' ? 'bg-blue-600' : 'bg-gray-600' }} text-white px-4 py-2 rounded">
            Vidlink.pro
        </button>
        <button wire:click="setEmbedType('auto')" class="{{ $embedType === 'auto' ? 'bg-blue-600' : 'bg-gray-600' }} text-white px-4 py-2 rounded">
            AutoEmbed.cc
        </button>
    </div>

    <div class="h-screen w-screen">
        <iframe src="{{ $embedUrl }}" frameborder="0" allowfullscreen class="w-full h-full"></iframe>
    </div>
</div>
