<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Hello2Controller;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test0', function() {
    //單筆資料 get param qqq = 111
    return view('welcome0')->with('qqq', '000');
    //多筆資料
    //return view('welcome0')->with(['ppp' => '222', 'qqq' =>30]);
});

// Route::get('/test11', function() {
//     //單筆資料 get param qqq = 111
//     return view('welcome1')->with('ppp', '111');
//     //多筆資料
//     //return view('welcome0')->with(['ppp' => '222', 'qqq' =>30]);
// });

Route::get('/test1',[HelloController::class,'show_ctu']);
Route::get('/test12/{aa?}',[Hello2Controller::class,'show_ctu2']);
Route::get('/test3/{me}',[HelloController::class,'show_ctu3']);
Route::get('/myclass/{id}',[HelloController::class,'show_ctu4']);




