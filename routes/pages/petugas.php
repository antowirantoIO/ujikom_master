<?php

use App\Http\Controllers\PetugasController;

Route::controller(PetugasController::class)->group(function () {
    Route::group([
        "prefix" => "petugas",
    ], function () {
        Route::get("/", "index")->name("petugas.index");
        Route::post("/", "store")->name("petugas.store");
        Route::get("/{petugas}", "show")->name("petugas.show");
        Route::put("/{petugas}", "update")->name("petugas.update");
        Route::delete("/{petugas}", "destroy")->name("petugas.destroy");
    });
});