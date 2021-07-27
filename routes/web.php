<?php

use Illuminate\Support\Facades\Route;
use App\Http\livewire\Profile;
use App\Http\livewire\Landing;
use App\Http\livewire\Inspirasis;
use App\Http\livewire\Sumbangide;
use App\Http\livewire\Permasalahan;
use App\Http\livewire\Chat;
use App\Http\livewire\Kategorikolaborasi;
use App\Http\livewire\Komentarmasalahs;
use App\Http\livewire\Komentarsolusis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile',Profile::class)->name('profile');
Route::get('/permasalahan',Permasalahan::class)->name('permasalahan');
Route::get('/sumbangide',Sumbangide::class)->name('sumbangide');
Route::get('/inspirasi',Inspirasis::class)->name('inspirasi');
Route::get('/chat',Chat::class)->name('chat');
Route::get('/kategori',Kategorikolaborasi::class)->name('kategori');
Route::get('/komentar/masalah',Komentarmasalahs::class)->name('masalah');
Route::get('/komentar/solusi',Komentarsolusis::class)->name('solusi');
Route::get('/',Landing::class)->name('');