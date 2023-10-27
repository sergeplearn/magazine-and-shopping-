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
Route::get('/test',TestController::class);
Route::resource('postproduct',PostproductController::class);
Route::resource('category',CategoryController::class);
Route::resource('event',EventController::class);
Route::resource('timeinterval',TimeintervalController::class);
Route::get('reservation',ViewreservationController::class);


Route::get('/unread/{id}','NotificationController@unread');
Route::get('/read/{id}','NotificationController@read');

Route::group(['namespace'=>'shop'],function (){
    Route::resource('shopping',ShoppingController::class);
    Route::resource('shop_category',ShopcategoryController::class);
    Route::get('shop',ShophomeController::class);
});


Route::get('/reservat','UserReservationController@create');
Route::get('/thanks','UserReservationController@thank');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
