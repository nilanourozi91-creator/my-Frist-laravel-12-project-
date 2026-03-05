<?php

use App\Http\Controllers\AuthoreController;
use App\Http\Controllers\barrowingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
route::apiResource('author' , AuthoreController::class);
route::apiResource('bro', barrowingsController::class);