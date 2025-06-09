<div class="max-w-4xl mx-auto p-4">
    <form wire:submit.prevent="search" class="flex items-center gap-2">
        <input type="text" wire:model.defer="query" placeholder="Search for movies or TV shows..."
               class="w-full px-4 py-2 bg-gray-800 text-white rounded" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Search
        </button>
    </form>
</div>
