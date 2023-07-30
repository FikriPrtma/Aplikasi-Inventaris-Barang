<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'postRegister']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/', [BerandaController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'postLogout']);

    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/barang/create', [BarangController::class, 'indexCreateBarang']);
    Route::post('/barang/create', [BarangController::class, 'postCreateBarang']);
    Route::get('/barang/update/{id}', [BarangController::class, 'indexUpdateBarang']);
    Route::put('/barang/update/{id}', [BarangController::class, 'postUpdateBarang']);
    Route::delete('/barang/delete/{id}', [BarangController::class, 'postDeleteBarang']);

    Route::get('/barang-masuk', [BarangMasukController::class, 'index']);
    Route::get('/barang-masuk/create', [BarangMasukController::class, 'indexCreateBarangMasuk']);
    Route::post('/barang-masuk/create', [BarangMasukController::class, 'postCreateBarangMasuk']);
    Route::get('/barang-masuk/update/{id}', [BarangMasukController::class, 'indexUpdateBarangMasuk']);
    Route::put('/barang-masuk/update/{id}', [BarangMasukController::class, 'postUpdateBarangMasuk']);
    Route::delete('/barang-masuk/delete/{id}', [BarangMasukController::class, 'postDeleteBarangMasuk']);

    Route::get('/barang-keluar', [BarangKeluarController::class, 'index']);
    Route::get('/barang-keluar/create', [BarangKeluarController::class, 'indexCreateBarangKeluar']);
    Route::post('/barang-keluar/create', [BarangKeluarController::class, 'postCreateBarangKeluar']);
    Route::get('/barang-keluar/update/{id}', [BarangKeluarController::class, 'indexUpdateBarangKeluar']);
    Route::put('/barang-keluar/update/{id}', [BarangKeluarController::class, 'postUpdateBarangKeluar']);
    Route::delete('/barang-keluar/delete/{id}', [BarangKeluarController::class, 'postDeleteBarangKeluar']);

    Route::get('/laporan', [LaporanController::class, 'index']);
});