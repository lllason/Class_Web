<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // dashboard-todo 頁面，位於 dashboard 路由群組中
    Route::get('/dashboard/todo', function () {
        return view('todo');
    })->name('dashboard-todo');    

    // dashboard-todo 頁面，位於 dashboard 路由群組中
    Route::get('/dashboard/todo2', function () {
        return view('todo2');
    })->name('dashboard-todo2');    


    Route::get('/dashboard/about', function () {
        return view('dashboard/about');
    })->name('dashboard-about');    

});