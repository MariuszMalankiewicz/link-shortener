<?php

use App\Http\Controllers\LinkApiController;

Route::post('/shorten', [LinkApiController::class, 'store']);
Route::get('/{shortCode}', [LinkApiController::class, 'redirect']);