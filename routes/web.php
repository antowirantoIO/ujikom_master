<?php

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function (Request $request) {
    $transaksi = Transaksi::where('no_invoice', $request->no_invoice)->first();
    return view('welcome', compact('transaksi'));
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    require_once "pages/petugas.php";
    require_once "pages/konsumen.php";
    require_once "pages/layanan.php";
    require_once "pages/pembayaran.php";
    require_once "pages/status.php";
    require_once "pages/transaksi.php";
    require_once "pages/laporan.php";
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
