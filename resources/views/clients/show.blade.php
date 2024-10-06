<x-app-layout title="Clients">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $client->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-visible bg-white shadow-xl sm:rounded-lg p-8">
                <h1>Информация о клиенте</h1>
                <h2>ID: {{ $client->id }}</h2>
                <h3>Name: {{ $client->name }}</h3>
            </div>
            <button wire:click="confirmDelete({{ $client->id }})"
                x-on:click="$wire.set('confirmingClientDeletion', true)">delete</button>
        </div>
    </div>
</x-app-layout>
