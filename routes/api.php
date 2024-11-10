<?php

use App\Http\Controllers\LinkApiController;

Route::post('/shorten', [LinkApiController::class, 'store']);