<?php

use Illuminate\Support\Facades\Route;
use App\Models\Client;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('clients', function () {
        return view('clients/index');
    })->name('clients.index');

    // Route::get('/clients/{client}', function () {
    //     return view('clients.show');
    // })->name('clients.show');

    // Route::get('/clients/{client}', function (Client $client) {
    //     return view('clients.show', ['client' => $client]);
    // })->name('clients.show');

    Route::get('clients/show/{client}', function (Client $client) {
        if ($client->user_id !== Auth::id()) {
            abort(403, 'Доступ запрещён'); // или другой обработчик
        }

        return view('clients.show', ['client' => $client]);
    })->name('clients.show');


});
