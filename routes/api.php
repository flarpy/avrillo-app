<?php

use App\Http\Controllers\QuoteController;
use App\Http\Middleware\TokenAuth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => TokenAuth::class], function () {
    Route::get('/quotes', [QuoteController::class, 'get'])->middleware(TokenAuth::class);
    // the below does exactly the same thing as the above but a separate endpoint was requested
    Route::get('/quotes/refresh', [QuoteController::class, 'get'])->middleware(TokenAuth::class);
});

