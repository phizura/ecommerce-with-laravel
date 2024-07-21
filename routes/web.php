<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UtilsController;
use App\Http\Controllers\BrandController;
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

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        //? temp image
        Route::post('/upload-temp-image', [UtilsController::class, 'createTempImages'])->name('temp-images.create');

        //? create slug
        Route::get('/getSlug', [UtilsController::class, 'createSlug'])->name('getSlug');

        //? Category
        Route::group(
            [
                'controller' => CategoryController::class,
                'as' => 'categories.',
                'prefix' => 'categories'
            ],
            function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/create', 'create')->name('create');
                Route::get('/{category}/edit', 'edit')->name('edit');
                Route::put('/{category}', 'update')->name('update');
                Route::delete('/{category}', 'destroy')->name('destroy');
            }
        );

        //? Sub Category
        Route::group(
            [
                'controller' => SubCategoryController::class,
                'as' => 'sub-category.',
                'prefix' => 'sub-category'
            ],
            function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/create', 'create')->name('create');
                Route::get('/{subCategory}/edit', 'edit')->name('edit');
                Route::put('/{subCategory}', 'update')->name('update');
                Route::delete('/{category}', 'destroy')->name('destroy');
            }
        );

        //? Brands
        Route::group(
            [
                'controller' => BrandController::class,
                'as' => 'brand.',
                'prefix' => 'brand'
            ],
            function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/create', 'create')->name('create');
                Route::get('/{brand}/edit', 'edit')->name('edit');
                Route::put('/{brand}', 'update')->name('update');
                Route::delete('/{brand}', 'destroy')->name('destroy');
            }
        );
    });
});
