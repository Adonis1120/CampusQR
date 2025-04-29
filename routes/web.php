<?php

use App\Enums\Role;
use App\Livewire\Qr\Generator;
use App\Livewire\Students\Students;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'pages/welcome')->name('home');

Route::view('dashboard', 'pages/dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('attendance', 'pages/attendance')
    ->middleware(['auth', 'verified'])
    ->name('attendance');

Route::view('scanner', 'pages/scanner')
    ->middleware(['auth', 'verified'])
    ->name('scanner');

/*
Route::view('generator', 'pages/generator')
    ->middleware(['auth', 'verified'])
    ->name('generator');
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/students', Students::class)->name('students');

    Route::middleware('role:' . Role::ADMIN->value)->group(function () {
        Route::get('/generator', Generator::class)->name('generator');
        Route::get('/users', Users::class)->name('users');
    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
