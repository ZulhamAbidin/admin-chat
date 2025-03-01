<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostinganController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/postingan/semua', [PostinganController::class, 'semua'])->name('postingan.semua');
Route::get('/postingan/{slug}', [PostinganController::class, 'show'])->name('postingan.show');