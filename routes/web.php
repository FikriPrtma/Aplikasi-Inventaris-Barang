<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/admin', function () {
    return view('admin/dashboard_admin');
});

//Admin Route
Route::controller(UserController::class)->name('user.')->group(function () {
    Route::get('/user', 'getUser')->name('getUser');
    Route::get('/tambah-user', 'tambahForm')->name('tambahForm');
    Route::get('/edit-user/{user}', 'editForm')->name('editForm');
    Route::post('/simpan-user', 'saveUser')->name('saveUser');
    Route::patch('/update-user/{user}', 'updateUser')->name('updateUser');
    Route::delete('/hapus-user/{user}', 'deleteUser')->name('deleteUser');
});

Route::controller(JabatanController::class)->name('jabatan.')->group(function () {
    Route::get('/jabatan', 'getJabatan')->name('getJabatan');
    Route::get('/tambah-jabatan', 'tambahForm')->name('tambahForm');
    Route::get('/edit-jabatan/{jabatan}', 'editForm')->name('editForm');
    Route::post('/simpan-jabatan', 'saveJabatan')->name('saveJabatan');
    Route::patch('/update-jabatan/{jabatan}', 'updateJabatan')->name('updateJabatan');
    Route::delete('/hapus-jabatan/{jabatan}', 'deleteJabatan')->name('deleteJabatan');
});

//Index
Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about.index');
});



// Sign Ruote :
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index']);
//Menyimpan data dari register
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');