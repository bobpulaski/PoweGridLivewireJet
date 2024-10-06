<div>

    <div class="flex">
        <button wire:click="showCreateClientModal"
            class="rounded border px-2 py-1 text-xs font-bold text-gray-500 hover:bg-gray-100 hover:text-gray-700">
            {{ __('+ Add Client') }}</button>
    </div>

    @if ($clients->count() === 0)
        <h3>Clients table is empty. Create a new record!</h3>
    @endif

    <x-table.table>
        <x-table.thead>
            <tr>
                <x-table.th>id</x-table.th>
                <x-table.th>name</x-table.th>
                <x-table.th>inn</x-table.th>
                <x-table.th>user_id</x-table.th>
                <x-table.th></x-table.th>
            </tr>
        </x-table.thead>
        <tbody>
            @foreach ($clients as $client)
                <x-table.tr>
                    <x-table.td>{{ $client->id }}</x-table.td>
                    <x-table.td class="td"><a wire:navigate
                            href="{{ route('clients.show', $client->id) }}" class="underline">{{ $client->name }}</a>
                        <br>
                        <small>{{ route('clients.show', $client->id) }}</small>
                    </x-table.td>
                    <x-table.td>{{ $client->inn }}</x-table.td>
                    <x-table.td>{{ $client->user_id }}</x-table.td>
                    <x-table.td>
                        {{-- <button wire:click="confirmDelete({{ $client->id }})" x-data
                            x-on:click="$dispatch('open-modal')">delete</button> --}}

                        <button wire:click="confirmDelete({{ $client->id }})"
                            x-on:click="$wire.set('confirmingClientDeletion', true)">delete</button>

                        {{-- <x-ui.dropdown-button>
                            <button @click="open = false"
                                class="block w-full cursor-pointer text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Open</button>
                            <button @click="open = false"
                                class="block w-full cursor-pointer text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</button>
                            <button @click="open = false"
                                class="block w-full cursor-pointer text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                wire:click="confirmDelete({{ $client->id }})">Delete</button>
                        </x-ui.dropdown-button> --}}
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </tbody>
    </x-table.table>

    {{ $clients->links() }}


    {{-- Окно подтверждения удаления Jetstream --}}
    <x-confirmation-modal wire:model="confirmingClientDeletion">
        <x-slot name="title"><x-typo.h6>{{ __('Delete Confirmation') }}</x-typo.h6></x-slot>
        <x-slot name="content">
            <p>Вы уверены, что хотите удалить клиента?</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingClientDeletion')" wire:loading.attr="disabled">
                Nevermind
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteClient"
                x-on:click="$wire.set('confirmingClientDeletion', false)" wire:loading.attr="disabled">
                Delete Client
            </x-danger-button></x-slot>
    </x-confirmation-modal>


    @if ($clientCreateWindowIsShow)
        <x-modal.modal>
            <x-modal.header>
                <x-typo.h5>{{ __('Client Create') }}</x-typo.h5>
            </x-modal.header>
            <form wire:submit="create">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" wire:model="name" class="form-control" id="name"
                        placeholder="Enter a name" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inn">Inn</label>
                    <input type="text" wire:model="inn" class="form-control" id="inn"
                        placeholder="Enter a inn" />
                    @error('inn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <x-modal.footer>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" wire:click="cancel" class="btn btn-primary">Cancel</button>
                </x-modal.footer>
            </form>
        </x-modal.modal>
    @endif
</div>

</div>
