<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;

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

// Homepage

Route::get('/', function () {
    return view('welcome');
});

// Tic Tac Toe

Route::get('/tictactoe', function () {
    return view('game/tictactoe');
});

//// Author
//
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// VueJS

Route::get('/vuejs', function () {
    return view('welcome');
});

// Admin

Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/showDashboard', [AdminController::class, 'showDashboard']);
Route::post('/dashboard', [AdminController::class, 'dashboard']);

// Category Product

Route::get('/addCategoryProduct', [CategoryProduct::class, 'addCategoryProduct']);
Route::get('/allCategoryProduct', [CategoryProduct::class, 'allCategoryProduct']);
Route::get('/editCategoryProduct/{categoryProductId}', [CategoryProduct::class, 'editCategoryProduct']);
Route::get('/deleteCategoryProduct/{categoryProductId}', [CategoryProduct::class, 'deleteCategoryProduct']);

Route::get('/unactiveCategoryProduct/{categoryProductId}', [CategoryProduct::class, 'unactiveCategoryProduct']);
Route::get('/activeCategoryProduct/{categoryProductId}', [CategoryProduct::class, 'activeCategoryProduct']);

Route::post('/saveCategoryProduct', [CategoryProduct::class, 'saveCategoryProduct']);
Route::post('/updateCategoryProduct/{categoryProductId}', [CategoryProduct::class, 'updateCategoryProduct']);

// Brand Product

Route::get('/addBrandProduct', [BrandProduct::class, 'addBrandProduct']);
Route::get('/allBrandProduct', [BrandProduct::class, 'allBrandProduct']);
Route::get('/editBrandProduct/{brandProductId}', [BrandProduct::class, 'editBrandProduct']);
Route::get('/deleteBrandProduct/{brandProductId}', [BrandProduct::class, 'deleteBrandProduct']);

Route::get('/unactiveBrandProduct/{brandProductId}', [BrandProduct::class, 'unactiveBrandProduct']);
Route::get('/activeBrandProduct/{brandProductId}', [BrandProduct::class, 'activeBrandProduct']);

Route::post('/saveBrandProduct', [BrandProduct::class, 'saveBrandProduct']);
Route::post('/updateBrandProduct/{brandProductId}', [BrandProduct::class, 'updateBrandProduct']);

// Product

Route::get('/addProduct', [ProductController::class, 'addProduct']);
Route::get('/allProduct', [ProductController::class, 'allProduct']);
Route::get('/editProduct/{productId}', [ProductController::class, 'editProduct']);
Route::get('/deleteProduct/{productId}', [ProductController::class, 'deleteProduct']);

Route::get('/unactiveProduct/{productId}', [ProductController::class, 'unactiveProduct']);
Route::get('/activeProduct/{productId}', [ProductController::class, 'activeProduct']);

Route::post('/saveProduct', [ProductController::class, 'saveProduct']);
Route::post('/updateProduct/{ProductId}', [ProductController::class, 'updateProduct']);
