<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthCustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login-customer', [AuthCustomerController::class, 'login']);
    Route::post('/register', [AuthCustomerController::class, 'register']);
    Route::post('/logout', [AuthCustomerController::class, 'logout']);
    Route::post('/refresh', [AuthCustomerController::class, 'refresh']);
    Route::get('/profile', [AuthCustomerController::class, 'userProfile']);
    Route::post('/change-pass', [AuthCustomerController::class, 'changePassWord']);    
    Route::post('/change-pass-mail', [UserController::class, 'changePassByEmailCustomer']);    

    Route::get('list-cart', [CartController::class, 'getAllCart']);
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart']);
    Route::get('remove-to-cart/{id}', [CartController::class, 'removeToCart']);
    Route::get('remove-all-cart', [CartController::class, 'removeAllCart']);
    Route::get('update-cart/{id}/{quantity}', [CartController::class, 'updateCart']);

    Route::get('add-to-cart-by-like/{id}', [CartController::class, 'addToCartBylike']);
    Route::get('remove-to-cart-by-like/{id}', [CartController::class, 'removeToCartBylike']);
    Route::get('list-cart-by-like', [CartController::class, 'getAllCartByLike']);

    Route::get('order/create', [OrderController::class, 'create']);
    Route::get('order/list-province', [OrderController::class, 'getAllProvince']);
    Route::get('order/list-district/{id}', [OrderController::class, 'getAllDistrictByProvinceId']);
    Route::get('order/list-ward/{id}', [OrderController::class, 'getAllWardByDistrictId']);
    Route::post('order/store', [OrderController::class, 'store']);
    Route::get('order/show/{id}', [OrderController::class, 'show']);
    Route::get('listorder/{id}', [OrderController::class, 'listorder']);

    Route::get('product_list',[ApiProductController::class,'product_list']);
    Route::get('product_list/search',[ApiProductController::class,'search']);

    Route::get('product_detail/{id}',[ApiProductController::class,'product_detail']);
    Route::get('product_images/{id}',[ApiProductController::class,'image_detail']);

    Route::get('category_list',[ApiProductController::class,'category_list']);
    Route::get('brand_list',[ApiProductController::class,'brand_list']);
    Route::get('trendingProduct',[ApiProductController::class,'trendingProduct']);
});