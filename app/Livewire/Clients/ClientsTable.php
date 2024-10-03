<?php

namespace App\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

class ClientsTable extends Component
{
    use WithPagination;

    // public $clients;
    public $clientToDelete = null;

    // public function mount()
    // {
    //     $this->clients = Client::paginate(4);
    //     dd($this->clients);
    // }

    public function confirmDelete($clientId)
    {
        $this->clientToDelete = $clientId;
    }

    public function deleteClient()
    {
        Client::destroy($this->clientToDelete);
        $this->clientToDelete = null; // сбрасываем ID клиента, чтобы скрыть окно подтверждения
        // $this->clients = Client::orderBy('id', 'asc')->paginate(4);
        // $this->clients = Client::orderBy('id', 'desc')->get(); // обновляем список
        $this->dispatch('client-deleted'); // опционально, для обработки на клиенте
    }

    public function render()
    {
        return view('livewire.clients.clients-table', [
            'clients' => Client::orderBy('id', 'asc')->paginate(5)
        ]);
    }
}
