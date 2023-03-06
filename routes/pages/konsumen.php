<?php

use App\Http\Controllers\KonsumenController;

Route::controller(KonsumenController::class)->group(function () {
    Route::group([
        "prefix" => "konsumen",
    ], function () {
        Route::get("/", "index")->name("konsumen.index");
        Route::post("/", "store")->name("konsumen.store");
        Route::get("/{konsumen}", "show")->name("konsumen.show");
        Route::put("/{konsumen}", "update")->name("konsumen.update");
        Route::delete("/{konsumen}", "destroy")->name("konsumen.destroy");
    });
});