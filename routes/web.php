<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Livewire\Welcome\Home::class);

Route::prefix('guest')->group(function () {
    Route::name('welcome.')->group(function () {
        Route::get('/daftar-aduan', \App\Livewire\Welcome\DaftarAduan::class)->name('daftar-aduan');
        Route::get('/profile', \App\Livewire\Welcome\Profile::class)->name('profile');
        Route::get('/detail-aduan/{noTracking}', \App\Livewire\Welcome\DetailAduan::class)->name('detail-aduan');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', \App\Livewire\Pages\Dashboard::class)->name('dashboard');
    Route::get('/formulir-aduan', \App\Livewire\Pages\FormulirAduan::class)->name('formulir-aduan');
    Route::get('/daftar-aduan', \App\Livewire\Pages\DaftarAduan::class)->name('daftar-aduan');
    Route::get('/detail-aduan/{noTracking}', \App\Livewire\Pages\DetailAduan::class)->name('detail-aduan');
});
