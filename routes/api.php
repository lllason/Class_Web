<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\StudentsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// middleware('auth:sanctum') 插入中界檢查程式 sanctum  
// create 路由關閉
Route::middleware('auth:sanctum')->group( function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::resource('products', ProductsController::class)->except(['create']);
        Route::resource('students', StudentsController::class)->except(['create']);
});