<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/caisseLogin', 'CashierController@caisseLogin');
Route::post('/screenLogin', 'CookController@screenLogin');

Route::get('/badis', 'CashierController@badis');


Route::post('/loginForScreen', 'CookController@loginForScreen');
Route::post('/login', 'CashierController@login');


Route::middleware('auth:api')->group(function () {
    
    Route::get('getAllCustomer', 'CashierController@getAllCustomer');
    Route::get('meals', 'CashierController@meals');
    Route::post('addOrderForm', 'CashierController@addOrderForm');
    Route::post('logout', 'CashierController@logout');
    
    Route::post('getCustomer', 'CashierController@getCustomer');
    Route::post('newCustomer', 'CashierController@newCustomer');

    
    Route::get('getOrderCompleted', 'CashierController@getOrderCompleted');
    Route::get('getOrderNoCompleted', 'CashierController@getOrderNoCompleted');

    Route::post('updateOrder', 'CashierController@updateOrder');

    Route::post('updateOrder', 'CashierController@updateOrder');

    Route::post('deleteOrder', 'CashierController@deleteOrder');



    Route::post('submitCompletedOrderMeal', 'CookController@submitCompletedOrderMeal');

    
    Route::post('getOrderForMyScreen', 'CookController@getOrderForMyScreen');
    Route::post('checkPromoCode', 'CashierController@checkPromoCode');

    
    



});