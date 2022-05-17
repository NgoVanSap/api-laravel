<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin')->group(function (){

    Route::prefix('admin')->group(function () {

        Route::prefix('home')->group(function () {

            Route::get('/', [\App\Http\Controllers\AdminController::class, 'homeAdmin'])->name('home.admin');

            Route::group(['prefix' => 'danh-muc'], function () {
                Route::get('/', [\App\Http\Controllers\DanhMucController::class, 'index'])->name('category.admin');
                Route::post('/', [\App\Http\Controllers\DanhMucController::class, 'create'])->name('category.admin.post');
                // Route::get('/{id}', [\App\Http\Controllers\DanhMucController::class, 'index'])->name('category.admin');


                Route::post('Ajax', [\App\Http\Controllers\DanhMucController::class, 'createPostAjax']);
                Route::get('get-data', [\App\Http\Controllers\DanhMucController::class, 'showData']);
                Route::get('deleteAjax/{id}', [\App\Http\Controllers\DanhMucController::class, 'destroyAjax']);
                Route::get('editAjax/{id}', [\App\Http\Controllers\DanhMucController::class, 'editAjax']);
                Route::post('update', [\App\Http\Controllers\DanhMucController::class, 'update']);
            });

            Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.admin');
            Route::post('/product', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.admin.post');


        });
    });
});



Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'index']);
Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'postLoginAdmin'])->name('admin.login');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'postLogoutAdmin'])->name('admin.logout');


