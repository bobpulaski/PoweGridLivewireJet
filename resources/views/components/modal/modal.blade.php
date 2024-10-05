<div x-on:click="show = false"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-10 backdrop-blur-[1px]">
    <div class="mx-4 w-1/3 rounded-lg bg-[#394d57] bg-opacity-90 shadow-lg backdrop-blur-[2px]">
        {{ $slot }}
    </div>
</div>
