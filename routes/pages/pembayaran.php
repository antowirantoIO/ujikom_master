<?php

use App\Http\Controllers\JenisPembayaranController;

Route::controller(JenisPembayaranController::class)->group(function () {
    Route::group([
        "prefix" => "pembayaran",
    ], function () {
        Route::get("/", "index")->name("pembayaran.index");
        Route::post("/", "store")->name("pembayaran.store");
        Route::get("/{jenis_pembayaran}", "show")->name("pembayaran.show");
        Route::put("/{jenis_pembayaran}", "update")->name("pembayaran.update");
        Route::delete("/{jenis_pembayaran}", "destroy")->name("pembayaran.destroy");
    });
});