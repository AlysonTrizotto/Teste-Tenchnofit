<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::apiResource('movements', App\Http\Controllers\v1\MovementsController::class)->only(['index']);
});