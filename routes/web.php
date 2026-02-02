<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function(){
    // Pre-defined by Livewire Starter Kit
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    
    Route::livewire('/new-chat', 'new-chat')
        ->name('new-chat');
    
    // Todo: add '/chats/{id}'
    Route::livewire('/chats', 'chats')
        ->name('chats');
    
    // Todo: add '/projects/{id}'
    Route::livewire('/projects', 'projects')
        ->name('projects');
});


require __DIR__.'/settings.php';
