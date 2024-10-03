<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>
                        <button wire:click="confirmDelete({{ $client->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $clients->links() }}

    {{-- Окно подтверждения удаления --}}
    @if ($clientToDelete)
        <div id="confirm-modal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-10 backdrop-blur-[1px]">
            <div class="mx-4 w-1/3 rounded-lg bg-[#394d57] bg-opacity-80 text-white shadow-lg backdrop-blur-[2px]">
                <div class="p-6">
                    <h2 class="text-lg font-semibold">{{ __('Delete Confirmation') }}</h2>
                    <p class="mt-2">Вы уверены, что хотите удалить клиента<span
                            id="clientId">{{ $clientToDelete }}</span>?</p>
                </div>
                <div class="flex justify-end p-4">
                    <button wire:click="deleteClient"
                        class="mr-2 rounded bg-gray-300 px-4 py-2 text-gray-700 hover:bg-gray-400">Yes</button>
                    <button wire:click="$set('clientToDelete', null)"
                        class="rounded bg-red-400 px-4 py-2 text-white hover:bg-red-600">No</button>
                </div>
            </div>
        </div>
    @endif

    @if ($clientToDelete)
        <div id="confirm-modal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-10 backdrop-blur-[1px]">
            <div class="mx-4 w-1/3 rounded-lg bg-[#394d57] bg-opacity-80 text-white shadow-lg backdrop-blur-[2px]">

                <form wire:submit="save">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{-- <a href="{{ route('clients.index') }}" class="btn btn-danger" wire:navigate>Back</a> --}}
                </form>
            </div>
        </div>
    @endif

</div>
