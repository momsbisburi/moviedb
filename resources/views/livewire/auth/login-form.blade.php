<div class="min-h-screen bg-cover bg-center bg-no-repeat relative"
     style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
     url('https://assets.nflxext.com/ffe/siteui/vlv3/.../large.jpg')">

    <div class="absolute inset-0 bg-black/50"></div>

    {{-- Header --}}
    <div class="relative z-10 px-4 py-6">
        <a href="/" class="text-red-600 text-3xl font-bold">
            DupeFlix
        </a>
    </div>

    {{-- Login Form --}}
    <div class="relative z-10 flex items-center justify-center min-h-[calc(100vh-100px)]">
        <div class="bg-black/75 p-16 rounded-md w-full max-w-md">
            <h1 class="text-white text-3xl font-semibold mb-8">Sign In</h1>

            @if ($error)
                <div class="bg-red-600 text-white p-3 rounded mb-4 text-sm">
                    {{ $error }}
                </div>
            @endif

            <form wire:submit.prevent="login" class="space-y-4">
                <input type="email" wire:model.defer="email" placeholder="Email or phone number"
                       class="w-full p-4 bg-gray-700 text-white rounded border-0 focus:bg-gray-600 focus:outline-none" required>

                <input type="password" wire:model.defer="password" placeholder="Password"
                       class="w-full p-4 bg-gray-700 text-white rounded border-0 focus:bg-gray-600 focus:outline-none" required>

                <button type="submit"
                        class="w-full bg-red-600 text-white py-3 rounded font-semibold hover:bg-red-700 transition-colors"
                        wire:loading.attr="disabled">
                    <span wire:loading.remove>Sign In</span>
                    <span wire:loading>Signing In...</span>
                </button>
            </form>

            <div class="mt-6 text-gray-400 text-sm flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2"> Remember me
                </label>
                <a href="#" class="hover:underline">Need help?</a>
            </div>

            <div class="mt-16 text-gray-400 text-sm">
                New to DupeFlix?
                <a href="/signup" class="text-white hover:underline">Sign up now</a>
            </div>
        </div>
    </div>
</div>
