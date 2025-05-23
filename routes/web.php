<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailBarangKeluarController;
use App\Http\Controllers\DetailBarangMasukController;
use App\Http\Controllers\KategoriBarang;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('supplier', SupplierController::class)->middleware('auth');
Route::resource('konsumen', KonsumenController::class)->middleware('auth');
Route::resource('barangmasuk', BarangMasukController::class)->middleware('auth');
Route::resource('detailbarangmasuk', DetailBarangMasukController::class)->middleware('auth');
Route::resource('barangkeluar', BarangKeluarController::class)->middleware('auth');
Route::resource('detailbarangkeluar', DetailBarangKeluarController::class)->middleware('auth');
Route::resource('kategoribarang', KategoriBarangController::class)->middleware('auth');
Route::resource('laporan', LaporanController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('laporanbarangmasuk', LaporanBarangMasukController::class)->middleware('auth');
// Route::resource('dashboard', DashboardController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
