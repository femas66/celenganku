<?php

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'store'])->name('actionlogin');
Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
Route::post('/actiondaftar', [DaftarController::class, 'store'])->name('actiondaftar');
Route::get('/home', [HomeController::class, 'index'])->middleware('cekLogin')->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/tambah-celengan', [HomeController::class, 'tambahcelengan'])->middleware('cekLogin')->name('tambahcelengan');
Route::post('/tambah-celengan', [HomeController::class, 'actiontambahcelengan'])->middleware('cekLogin')->name('actiontambahcelengan');
Route::get('/tabungan/{id}', [HomeController::class, 'detailtabungan'])->middleware('cekLogin');
Route::get('/tabungan/tambah/{id}', [HomeController::class, 'viewtambahuang'])->middleware('cekLogin');
Route::post('/tabungan/tambah', [HomeController::class, 'tambahuang'])->middleware('cekLogin')->name('tambahtabungan');
Route::get('/tabungan/kurang/{id}', [HomeController::class, 'viewkuranguang'])->middleware('cekLogin');
Route::post('/tabungan/kurang', [HomeController::class, 'kuranguang'])->middleware('cekLogin')->name('kurangtabungan');
Route::get('/hapus/id/{id}', [HomeController::class, 'hapus'])->middleware('cekLogin');