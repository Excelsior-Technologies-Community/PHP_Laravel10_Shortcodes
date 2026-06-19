<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortcodeController;

Route::get('/', [ShortcodeController::class, 'index']);

Route::post(
    '/parse',
    [ShortcodeController::class, 'parse']
);