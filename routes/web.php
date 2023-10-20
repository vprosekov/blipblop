<?php

use App\Http\Middleware\CheckCookieToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\IndexController;

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

// through CheckCookieToken middleware
Route::middleware([CheckCookieToken::class])->group(function () {
    Route::get('/', [IndexController::class,'index'])->name('newsfeed');
    Route::get('/logout', [IndexController::class,'logout'])->name('logout');
});


Route::get('/login', [IndexController::class,'login'])->name('login');
Route::get('/register', [IndexController::class,'register'])->name('register');