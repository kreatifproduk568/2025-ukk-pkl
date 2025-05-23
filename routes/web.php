<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/siswa', function () {
    return "Siswa";
})->middleware(['auth', 'verified','role:siswa'])
 ->name('siswa');

Route::get('/', function () {
    return view('w');
})->middleware(['auth','verified','role:siswa'])->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified','role:siswa','check_user_email'])
//     ->name('dashboard');

Route::middleware(['auth', 'verified','role:siswa','check_user_email'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/industri', App\Livewire\Front\Industri\Index::class)->name('industri');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';