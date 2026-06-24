<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortcodeController;

Route::get('/', [ShortcodeController::class,'index']);

Route::post('/parse', [ShortcodeController::class,'parse']);

Route::get('/history/{id}', [ShortcodeController::class,'show']);

Route::delete('/history/{id}', [ShortcodeController::class,'destroy']);