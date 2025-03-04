<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\SiswaController;
use Filament\Http\Middleware\Authenticate;
use Filament\Facades\FilamentAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/postingan/semua', [PostinganController::class, 'semua'])->name('postingan.semua');
Route::get('/postingan/{slug}', [PostinganController::class, 'show'])->name('postingan.show');
Route::post('/komentar/store', [PostinganController::class, 'store'])->name('komentar.store');
Route::get('/kategori/{slug}', [PostinganController::class, 'indexByCategory'])->name('kategori.postingan');
Route::get('/jurusan', [WelcomeController::class, 'jurusan'])->name('jurusan.index');
Route::get('/guru', [WelcomeController::class, 'guru'])->name('guru.index');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswa.data');


Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');