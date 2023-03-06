<?php

use App\Http\Controllers\StatusPesananController;

Route::controller(StatusPesananController::class)->group(function () {
    Route::group([
        "prefix" => "status",
    ], function () {
        Route::get("/", "index")->name("status.index");
        Route::post("/", "store")->name("status.store");
        Route::get("/{statusPesanan}", "show")->name("status.show");
        Route::put("/{statusPesanan}", "update")->name("status.update");
        Route::delete("/{statusPesanan}", "destroy")->name("status.destroy");
    });
});