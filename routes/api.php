<?php

use App\Http\Controllers\AuthoreController;
use App\Http\Controllers\barrowingsController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\memberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
route::apiResource('author' , AuthoreController::class);
route::apiResource('bro', barrowingsController::class)->only('index','store','show');
route::post('bro/{bro_id}/return',[barrowingsController::class,'returnedbook']);
route::get('bro/{bro_id}/return',[barrowingsController::class,'overdue']);
// route::post('bro/{bro_id}/return',[barrowingsController::class,'overdue']);
Route::apiResource('books',bookController::class);
Route::apiResource('member',memberController::class);