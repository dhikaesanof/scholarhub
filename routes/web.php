<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Admin\Scholarship\ScholarshipList;
use App\Livewire\Admin\Scholarship\CreateScholarship;
use App\Livewire\Admin\Scholarship\EditScholarship;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'role:STUDENT'])->group(function () {
    
    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    
});

Route::middleware(['auth', 'role:MENTOR'])->group(function () {

    Route::view('/mentor/dashboard', 'mentor.dashboard');

});

Route::middleware(['auth', 'role:ADMIN'])->group(function () {

    Route::view('/admin/dashboard', 'admin.dashboard');

    Route::get('/admin/scholarships', ScholarshipList::class);

    Route::get('/admin/scholarships/create', CreateScholarship::class);

    Route::get('/admin/scholarships/{scholarship}/edit', EditScholarship::class);

});

require __DIR__.'/auth.php';
