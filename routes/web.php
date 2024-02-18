<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LotController::class, 'index'])->name('lot.index');
Route::post('/submit_page', [App\Http\Controllers\LotController::class, 'store'])->name('lot.store');
Route::get("/total_page", [App\Http\Controllers\LotController::class, 'showTotalPage'])->name('lot.showTotalPage');
Route::post('/info_lot', [App\Http\Controllers\InfoLotController::class, 'store'])->name('lot.storeInfoLot');

Route::get("/lot_not_found", [App\Http\Controllers\LotController::class, 'lot_not_found'])->name('lot_not_found');

