<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
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

Route::get('/', function () {
    return view('index');
});
Route::get('login', [AuthController::class,'loginForm'])->name('login');
Route::post('login', [AuthController::class,'auth'])->name('auth');
Route::post('logout', [AuthController::class,'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('index');
    Route::get('pegawai', [HomeController::class,'pegawai'])->name('pegawai');
    Route::get('user', [HomeController::class,'user'])->name('user');
    Route::get('cari-pegawai', [HomeController::class,'cariPegawai'])->name('cari-pegawai');
    Route::get('unit-kerja', [HomeController::class,'unitKerja']);
    Route::get('cetak-pegawai', [HomeController::class,'cetakPegawai'])->name('cetak-pegawai');


    Route::get('add-pegawai', [HomeController::class,'addPegawai'])->name('add-pegawai');
    Route::get('edit-pegawai/{id}', [HomeController::class,'editPegawai'])->name('edit-pegawai');
    //store pegawai
    Route::post('store-pegawai', [PegawaiController::class,'store'])->name('store-pegawai');
    Route::post('update-pegawai/{id}', [PegawaiController::class,'update'])->name('update-pegawai');
    Route::post('delete-pegawai', [PegawaiController::class,'delete'])->name('delete-pegawai');
});