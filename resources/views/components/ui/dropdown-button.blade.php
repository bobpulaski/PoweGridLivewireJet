<div x-data="{ open: false }" class="relative inline-block text-left">
    <div>
        <button @click="open = !open" type="button"
            class="rounded border px-2 py-1 text-xs font-bold text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition duration-150 ease-in-out"
            id="menu-button" aria-expanded="true" aria-haspopup="true">
            ...
        </button>
    </div>

    <div x-show="open" @click.away="open = false"
        class="absolute z-50 right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 transition duration-300 ease-in-out"
        x-transition:enter="transition transform ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition transform ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" role="menu"
        aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
            {{ $slot }}
        </div>
    </div>
</div>
