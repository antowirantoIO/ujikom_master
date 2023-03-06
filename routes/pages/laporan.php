<?php

use App\Http\Controllers\LaporanController;

Route::controller(LaporanController::class)->group(function () {
    Route::group([
        "prefix" => "laporan",
    ], function () {
        Route::get("/transaksi", "transaksi")->name("laporan.transaksi");
        Route::get("/transaksi/ajax", "transaksi_ajax")->name("laporan.transaksi.ajax");
    });
});
