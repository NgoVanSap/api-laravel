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


//ADMIN
Route::middleware('admin')->group(function (){

    Route::prefix('admin')->group(function () {

        Route::prefix('home')->group(function () {

            Route::get('/', [\App\Http\Controllers\AdminController::class, 'homeAdmin'])->name('home.admin');

            Route::middleware('registerMember')->group(function () {
                Route::get('/More-members', [\App\Http\Controllers\AdminController::class, 'viewMoremembers'])->name('home.admin.Moremembers');
                Route::post('/More-members', [\App\Http\Controllers\AdminController::class, 'postMoremember'])->name('home.admin.Moremembers');

                Route::middleware('deleteMember','editMember')->group(function () {

                    Route::get('/More-members/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteMoremembers'])->name('home.admin.deleteMember');
                    Route::get('/More-members/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editMoremembers'])->name('home.admin.editMember');
                    Route::get('/More-members/edit-detail/{id}', [\App\Http\Controllers\AdminController::class, 'editDetailMoremembers'])->name('home.admin.editDetailMember');
                    Route::post('/More-members/update', [\App\Http\Controllers\AdminController::class, 'updateMoremembers'])->name('home.admin.updateMember');

                });

            });

            Route::group(['prefix' => 'danh-muc'], function () {
                Route::get('/', [\App\Http\Controllers\DanhMucController::class, 'index'])->name('category.admin');
                Route::post('/', [\App\Http\Controllers\DanhMucController::class, 'create'])->name('category.admin.post');


                Route::post('Ajax', [\App\Http\Controllers\DanhMucController::class, 'createPostAjax']);
                Route::get('get-data-ajax', [\App\Http\Controllers\DanhMucController::class, 'showData']);
                Route::get('deleteAjax/{id}', [\App\Http\Controllers\DanhMucController::class, 'destroyAjax']);
                Route::get('editAjax/{id}', [\App\Http\Controllers\DanhMucController::class, 'editAjax']);
                Route::post('update', [\App\Http\Controllers\DanhMucController::class, 'update']);
            });

            Route::get('/add-attribute/{id}', [\App\Http\Controllers\AttributeController::class, 'index'])->name('attribute.admin.add');
            Route::get('/delete-attribute/{id}', [\App\Http\Controllers\AttributeController::class, 'deleteAttribute'])->name('attribute.admin.delete');
            Route::post('/update-attribute/{id}', [\App\Http\Controllers\AttributeController::class, 'updateAttribute'])->name('attribute.admin.update');

            Route::match(['get', 'post'], '/insert-attribute/{id}' , [\App\Http\Controllers\AttributeController::class, 'insertAttribute'])->name('add.attribute.admin');


            Route::get('/product', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.admin');
            Route::get('/product/1', [\App\Http\Controllers\ProductController::class, 'index']);
            Route::get('/product/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('admin.search');
            Route::get('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
            Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
            Route::post('/product/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update');
            Route::get('/product/edit/detail/{id}', [\App\Http\Controllers\ProductController::class, 'detail'])->name('product.edit.detail');
            Route::post('/product', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.admin.post');


        });
    });
});
//WEBSITE


Route::get('/' , [\App\Http\Controllers\websiteAll\WebsiteController::class, 'index'])->name('website.index');



Route::get('detail/{slug}' , [\App\Http\Controllers\websiteAll\WebsiteDetailProductController::class, 'index'])->name('product.slug.index');
Route::get('all' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'index'])->name('product.all.index');

Route::get('{namecategory}' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'categoryProduct'])->name('product.category.index');
Route::get('clearance/sale' , [\App\Http\Controllers\websiteAll\CategoryController::class, 'categoryProductSale'])->name('product.category.sale.index');

Route::post('/addToCart/{id}' , [\App\Http\Controllers\websiteAll\CartController::class, 'addToCartProduct']);
Route::get('/view/Cart' , [\App\Http\Controllers\websiteAll\CartController::class, 'viewCartProduct'])->name('viewCartProduct.website');
Route::get('/load/Cart' , [\App\Http\Controllers\websiteAll\CartController::class, 'loadCartProduct'])->name('loadCartProduct.website');
Route::post('/update/Cart' , [\App\Http\Controllers\websiteAll\CartController::class, 'updateCartProduct'])->name('updateCartProduct.website');
Route::get('/delete/Cart/{id}' , [\App\Http\Controllers\websiteAll\CartController::class, 'deleteCartProduct'])->name('deleteCartProduct.website');


Route::get('/view/Cart' , [\App\Http\Controllers\websiteAll\CartController::class, 'viewCartProduct'])->name('viewCartProduct.website');


















Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'index']);
Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'postLoginAdmin'])->name('admin.login');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'postLogoutAdmin'])->name('admin.logout');


