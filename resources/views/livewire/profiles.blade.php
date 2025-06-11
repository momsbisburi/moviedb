<div class="min-h-screen bg-black flex flex-col items-center justify-center">
    <div class="text-center">
        <h1 class="text-white text-4xl md:text-6xl font-light mb-8">Who's watching?</h1>

        <div class="flex flex-wrap justify-center gap-8 max-w-4xl">
            @foreach ($profiles as $profile)
                <div wire:click="selectProfile({{ $profile['id'] }})"
                     class="flex flex-col items-center cursor-pointer group">
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-lg overflow-hidden mb-4 border-2 border-transparent group-hover:border-white transition-all duration-200">
                        <img src="{{ $profile['avatar'] }}" alt="{{ $profile['name'] }}"
                             class="w-full h-full object-cover">
                    </div>
                    <span class="text-white text-lg md:text-xl font-light group-hover:font-normal transition-all duration-200">
                        {{ $profile['name'] }}
                    </span>
                    @if ($profile['isKids'])
                        <span class="text-gray-400 text-sm mt-1">KIDS</span>
                    @endif
                </div>
            @endforeach

            {{-- Add Profile --}}
            <div class="flex flex-col items-center cursor-pointer group">
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-lg bg-gray-800 border-2 border-transparent group-hover:border-white transition-all duration-200 flex items-center justify-center mb-4">
                    <span class="text-white text-6xl">+</span>
                </div>
                <span class="text-white text-lg md:text-xl font-light group-hover:font-normal transition-all duration-200">
                    Add Profile
                </span>
            </div>
        </div>

        <button class="mt-12 px-8 py-2 border border-gray-400 text-gray-400 hover:text-white hover:border-white transition-colors">
            MANAGE PROFILES
        </button>
    </div>
</div>
