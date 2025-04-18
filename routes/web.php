<?php

use App\Http\Controllers\PostController;
use App\Livewire\Home\Posts;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {

    Route::controller(PostController::class)->group(function () {
        Route::get("/posts", 'index')->name('posts');
        Route::get("/posts/AddPost", 'addPost')->name('posts.AddPost');
        Route::get("/posts/editPost/{post}", 'editPost')->name('posts.editPost');
    });



    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
