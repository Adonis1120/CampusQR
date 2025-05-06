<?php

use App\Enums\Role;
use App\Livewire\Dashboard\Index;
use App\Livewire\Qr\Generator;
use App\Livewire\Qr\Report;
use App\Livewire\Qr\Scanner;
use App\Livewire\Students\Students;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'pages/welcome')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Index::class)->name('dashboard');
    Route::get('/students', Students::class)->name('students');
    Route::get('/attendance', Report::class)->name('attendance');

    Route::middleware('role:' . Role::ADMIN->value)->group(function () {
        Route::get('/generator', Generator::class)->name('generator');
        Route::get('/scanner', Scanner::class)->name('scanner');
        Route::get('/users', Users::class)->name('users');
    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
