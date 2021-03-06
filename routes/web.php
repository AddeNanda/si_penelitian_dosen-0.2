<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data\AdminController;
use App\Http\Controllers\Data\DosenController;
use App\Http\Controllers\Data\ManajerController;
use App\Http\Controllers\Data\PengurusController;
use App\Http\Controllers\PenelitianController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.user.home');
});

Route::resource('data-dosen', DosenController::class);
Route::resource('data-pengurus', PengurusController::class);
Route::resource('data-manajer', ManajerController::class);
Route::resource('data-admin', AdminController::class);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/penelitian', [PenelitianController::class, 'index'])->name('penelitian.index');
Route::get('/penelitian/tambah', [PenelitianController::class, 'create'])->name('penelitian.create');
Route::post('/penelitian/tambah/kirim', [PenelitianController::class, 'store'])->name('penelitian.store');
Route::get('/penelitian/edit/{id}', [PenelitianController::class, 'edit'])->name('penelitian.edit');
Route::put('/penelitian/edit/update/{id}', [PenelitianController::class, 'update'])->name('penelitian.update');

Route::get('/penelitian/admin', [PenelitianController::class, 'index_2'])->name('penelitian.index-2');
Route::put('/penelitian/admin/verifikasi/{id}', [PenelitianController::class, 'verifikasi'])->name('penelitian.verifikasi');
Route::put('/penelitian/admin/batalkan/{id}', [PenelitianController::class, 'batalkan'])->name('penelitian.batalkan');

require __DIR__.'/auth.php';
