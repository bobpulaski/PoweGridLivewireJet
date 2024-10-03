<div>

    <button wire:click="showCreateClientModal"
        class="rounded border px-2 py-1 text-xs font-bold text-gray-500 hover:bg-gray-100 hover:text-gray-700">
        {{ __('+ Add Client') }}</button>

    <x-table.table>
        <x-table.thead>
            <tr>
                <x-table.th>ID</x-table.th>
                <x-table.th>Name</x-table.th>
                <x-table.th>Actions</x-table.th>
            </tr>
        </x-table.thead>
        <tbody>
            @foreach ($clients as $client)
                <x-table.tr>
                    <x-table.td>{{ $client->id }}</x-table.td>
                    <x-table.td>{{ $client->name }}</x-table.td>
                    <x-table.td>
                        <button wire:click="confirmDelete({{ $client->id }})">Delete</button>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </tbody>
    </x-table.table>

    {{ $clients->links() }}

    {{-- Окно подтверждения удаления --}}
    @if ($clientToDelete)
        <x-modal.modal>
            <x-modal.header>
                <x-typo.h6>{{ __('Delete Confirmation') }}</x-typo.h6>
            </x-modal.header>
            <x-modal.content>
                <p>Вы уверены, что хотите удалить клиента?</p>
            </x-modal.content>
            <x-modal.footer>
                <button wire:click="deleteClient"
                    class="mr-2 rounded bg-gray-300 px-4 py-2 text-gray-700 hover:bg-gray-400">Yes</button>
                <button wire:click="$set('clientToDelete', null)"
                    class="rounded bg-red-400 px-4 py-2 text-white hover:bg-red-600">No</button>
            </x-modal.footer>
        </x-modal.modal>
    @endif

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
</div>
@endif

</div>
