<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
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

Route::group(['prefix'=> 'admin'], function () {

    Route::group(['middleware'=> 'admin.guest'], function () {

        Route::get('/login', [AuthController::class,'index'])->name('admin.login');
        Route::post('/authenticate', [AuthController::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware'=> 'admin.auth'], function () {
        Route::get('/dashboard', [HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout', [AuthController::class,'logout'])->name('admin.logout');
    });
});
