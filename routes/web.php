<?php

use App\Http\Controllers\CmAppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Contacts Routes
Route::get('/contacts', [CmAppController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [CmAppController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{id}', [CmAppController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{id}/edit', [CmAppController::class, 'edit'])->name('contacts.edit');

Route::post('/contacts', [CmAppController::class, 'store'])->name('contacts.store');
Route::put('/contacts/{id}', [CmAppController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{id}', [CmAppController::class, 'destroy'])->name('contacts.destroy');
