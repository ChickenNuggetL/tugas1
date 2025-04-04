<?php

use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::resource('items', ItemController::class);

Route::get('/', function () {
    return redirect()->route('promotions.index');
});

Route::resource('promotions', PromotionController::class);