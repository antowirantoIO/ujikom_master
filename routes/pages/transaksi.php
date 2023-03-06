<?php

use App\Http\Controllers\TransaksiController;

Route::controller(TransaksiController::class)->group(function () {

    Route::group([
        "prefix" => "transaksi",
    ], function () {

        Route::get("/", "index")->name("transaksi.index");
        Route::get("/create", "create")->name('transaksi.create');
        Route::post("/", "store")->name("transaksi.store");
        Route::get("/{transaksi}", "show")->name("transaksi.show");
        Route::get("/{transaksi}/edit", "edit")->name("transaksi.edit");
        Route::put("/{transaksi}", "update")->name("transaksi.update");
        Route::delete("/{transaksi}", "destroy")->name("transaksi.destroy");

    });
});