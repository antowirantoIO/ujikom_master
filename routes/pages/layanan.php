<?php

use App\Http\Controllers\LayananController;

Route::controller(LayananController::class)->group(function () {
    Route::group([
        "prefix" => "layanan",
    ], function () {
        Route::get("/", "index")->name("layanan.index");
        Route::post("/", "store")->name("layanan.store");
        Route::get("/{layanan}", "show")->name("layanan.show");
        Route::put("/{layanan}", "update")->name("layanan.update");
        Route::delete("/{layanan}", "destroy")->name("layanan.destroy");
    });
});