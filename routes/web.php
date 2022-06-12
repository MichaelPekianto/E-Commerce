<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware'=> 'admin'],function(){
    Route::get('/managecategory', [ProductController::class, 'managecategory']);
    Route::get('/updatecategory/{id}', [ProductController::class, 'updatecategoryPage']);
    Route::post('/updatecategory/{id}', [ProductController::class, 'updatecategory']);
    Route::get('/deletecategory/{id}', [ProductController::class, 'deletecategory']);
    Route::get('/insertcategory', [ProductController::class, 'insertcategoryPage']);
    Route::post('/insertcategory', [ProductController::class, 'insertcategory']);
    Route::get('/manageuser', [UserController::class, 'manageuser']);
    Route::post('/manageuser/{id}', [UserController::class, 'delete']);

});
Route::group(['middleware'=>'member'],function(){
    Route::get('/profile', [ProductController::class, 'profile']);
    Route::post('/updateprofile', [UserController::class, 'updateprofile']);
    Route::post('/updatepassword', [UserController::class, 'updatepassword']);
    Route::post('/cart/{id}', [CartController::class, 'add']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/updatecart/{id}', [CartController::class, 'updatecart']);
    Route::get('/deletecart/{id}', [CartController::class, 'deletecart']);
    Route::get('/transaction', [CartController::class, 'checkout']);
    Route::get('/shop', [ProductController::class, 'myshop']);
    Route::get('/transactionhistory', [CartController::class, 'transactionhistory']);
    Route::get('/transactiondetail/{id}', [CartController::class, 'transactiondetail']);
    Route::get('/newshop', [ProductController::class, 'newshop']);
    Route::post('/createnewshop', [ProductController::class, 'createshop']);
    Route::get('/insert', [ProductController::class, 'insertPage']);
    Route::post('/insert', [ProductController::class, 'insert']);
    Route::get('/update/{id}', [ProductController::class, 'updatePage']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::get('/delete/{id}', [ProductController::class, 'delete']);

});
Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/details/{id}',[ProductController::class,'details']);
Route::get('/search/{id}',[ProductController::class,'searchcategory']);
Route::get('/search',[ProductController::class,'search']);
Route::get('/shop/{id}', [ProductController::class, 'shop']);
Route::get('/shopinfo/{id}',[ProductController::class, 'shopinfo']);

