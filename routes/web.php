<?php

use App\Livewire\Chatbot;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Redirect dashboard to chat
    Route::redirect('dashboard', 'chat');
});



Route::get('/chat', Chatbot::class)->name('chat')->middleware(['auth']);

require __DIR__.'/settings.php';
