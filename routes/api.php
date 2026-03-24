<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\authController;
use App\Http\Controllers\authoraisationController;
use App\Http\Controllers\AuthoreController;
use App\Http\Controllers\barrowingsController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
route::apiResource('bro', barrowingsController::class)->only('index','store','show');
route::post('bro/{request}/return',[barrowingsController::class,'returnedbook']);
route::get('bro/{bro_id}/return',[barrowingsController::class,'overdue']);

route::middleware( 'auth:sanctum')->group( function(){
  Route::apiResource('member',memberController::class);
  Route::apiResource('books',bookController::class);
//   Route::post('logOut',[AuthenticatedSessionController::class,'logOut']);
route::post('logOut',[authoraisationController::class,'logOut' ]);
});

 //Auyhontaction
route::post('user',[authoraisationController::class,'signUp']);
route::post('login',[authoraisationController::class,'login' ]);