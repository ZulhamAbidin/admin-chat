<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostinganController;
use Filament\Http\Middleware\Authenticate;
use Filament\Facades\FilamentAdmin;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/postingan/semua', [PostinganController::class, 'semua'])->name('postingan.semua');
Route::get('/postingan/{slug}', [PostinganController::class, 'show'])->name('postingan.show');
Route::post('/komentar/store', [PostinganController::class, 'store'])->name('komentar.store');