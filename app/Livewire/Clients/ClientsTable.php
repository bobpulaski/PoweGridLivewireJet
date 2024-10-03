<?php

namespace App\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

class ClientsTable extends Component
{
    use WithPagination;

    public $clientToDelete = null;
    public $clientCreateWindowIsShow = false;

    public $name = '';
    public $inn = '';

    public function confirmDelete($clientId)
    {
        $this->clientToDelete = $clientId;
    }

    public function showCreateClientModal()
    {
        $this->clientCreateWindowIsShow = true;
        $this->name = '';
        $this->inn = '';
    }

    public function cancel()
    {
        $this->reset('name', 'inn'); // Чтобы обнулить значения полей
        $this->resetErrorBag(); // Обнуление сообщений об ошибках
        $this->clientCreateWindowIsShow = false;
    }

    public function create()
    {
        $validated = $this->validate([
            'name' => 'required',
            'inn' => 'required',
        ]);

        Client::create($validated);
        $this->clientCreateWindowIsShow = false;
    }

    public function deleteClient()
    {
        Client::destroy($this->clientToDelete);
        $this->clientToDelete = null; // сбрасываем ID клиента, чтобы скрыть окно подтверждения
        $this->dispatch('client-deleted'); // опционально, для обработки на клиенте
    }

    public function render()
    {
        return view('livewire.clients.clients-table', [
            'clients' => Client::orderBy('created_at', 'desc')->paginate(125),
        ]);
    }
}
