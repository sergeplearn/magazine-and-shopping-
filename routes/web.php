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



Route::get('/unread/{id}','NotificationController@unread');
Route::get('/read/{id}','NotificationController@read');


Route::group(['prefix'=>'Admin','middleware'=>'auth'],function (){

    Route::group(['namespace'=>'addAdmin'],function (){
        Route::resource('Registration',AddadminController::class)->names('User');

    });

Route::group(['namespace'=>'blog'],function (){
    Route::resource('blog/product',PostproductController::class)
        ->except('show')->names('postproduct');
    Route::resource('reservation',EventController::class)->names('event')->except('store');
    Route::resource('booking_time',TimeintervalController::class)->names('timeinterval');

    Route::resource('blog/category',CategoryController::class)->except('show')->names('category');



});

Route::group(['namespace'=>'shop'],function (){
    Route::resource('shopping',ShoppingController::class)->except('show');
    Route::resource('shopping/category',ShopcategoryController::class)
        ->except(['show'])->names('shop_category');


});

});


Route::group(['prefix'=>'User'],function (){

Route::group(['namespace'=>'shop'],function (){

    Route::get('/shopping/category/{shop_category}','ShopcategoryController@show')
        ->name('shop_category.show');

    Route::get('/shopping/{shopping}','ShoppingController@show')
        ->name('shopping.show');
    Route::get('shop',ShophomeController::class)->name('shop.show');
});


Route::group(['namespace'=>'blog','prefix'=>'User'],function (){
    Route::post('/reservation','EventController@store')->name('event.store');
    Route::get('/reservat','UserReservationController@create')->name('reservation.create');
    Route::get('/thanks','UserReservationController@thank')->name('reservation.thanks');
    Route::get('/postproduct/{postproduct}','PostproductController@show')->name('postproduct.show');
    Route::get('/category/{category}','CategoryController@show')->name('category.show');
    Route::get('reservation',ViewreservationController::class)->name('reservation.index');

});
});











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
