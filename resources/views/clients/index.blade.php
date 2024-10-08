<x-app-layout title="Clients">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-visible bg-white shadow-xl sm:rounded-lg p-8">
                @livewire('clients.clients-table')
            </div>
        </div>
    </div>
</x-app-layout>
