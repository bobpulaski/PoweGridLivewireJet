<?php

namespace App\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;
use Laravel\Jetstream\InteractsWithBanner;

class ClientsTable extends Component
{
    use WithPagination;
    use InteractsWithBanner;

    public $clientToDelete = null;
    public $clientCreateWindowIsShow = false;
    public $confirmingClientDeletion = false;

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
        // Валидация входных данных
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'inn' => 'required|string|max:12', // Укажите длину INN в зависимости от вашей логики
        ]);
        $validated['user_id'] = auth()->id();

        // Добавляем текущий ID пользователя

        Client::create($validated);

        $this->clientCreateWindowIsShow = false;

        // $this->dispatch('alert', [
        //     'type' => 'success',
        //     'message' => __('User has been created.'),
        // ]);
    }

    public function deleteClient()
    {
        Client::destroy($this->clientToDelete);
        $this->banner('Client has been deleted.');
        // $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.clients.clients-table', [
            'clients' => Client::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(30),
        ]);
    }
}
