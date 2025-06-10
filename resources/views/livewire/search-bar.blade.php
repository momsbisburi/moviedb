<div class="">
    <form wire:submit.prevent="search" class="relative w-full max-w-md block">
        <input
            type="text"
            wire:model.defer="query"
            placeholder="Titles"
            class="w-full bg-white/10 text-white placeholder-gray-300 rounded-full pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-red-600"
        />
        <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
            </svg>
        </button>
    </form>
</div>
