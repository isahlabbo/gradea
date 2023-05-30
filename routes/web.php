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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::name('staff.')
    ->prefix('/staff')
    ->group(function (){
        Route::get('/','StaffController@index')->name('index');
        Route::post('/register','StaffController@register')->name('register');
        Route::post('/{staffId}/update','StaffController@update')->name('update');
        Route::get('/{staffId}/delete','StaffController@delete')->name('delete');
    });

    Route::name('customer.')
    ->prefix('/customer')
    ->group(function (){
        Route::name('order.')
        ->prefix('{customerId}/order')
        ->group(function (){
            Route::post('/register','OrderController@register')->name('register');
            Route::post('/{orderId}/update','OrderController@update')->name('update');
            // customer.order.item
            Route::name('item.')
            ->prefix('{orderId}/item')
            ->group(function (){
                Route::get('/','OrderItemController@index')->name('index');
                Route::post('/{itemId}/update','OrderItemController@update')->name('update');
            });
        });

        Route::get('/','CustomerController@index')->name('index');
        Route::post('/register','CustomerController@register')->name('register');
        Route::post('/{customerId}/update','CustomerController@update')->name('update');
        Route::get('/{customerId}/delete','CustomerController@delete')->name('delete');
    });

    

    

    Route::name('category.')
    ->prefix('/category')
    ->group(function (){
        Route::get('/','CategoryController@index')->name('index');
        Route::post('/register','CategoryController@register')->name('register');
        Route::post('/{categoryId}/update','CategoryController@update')->name('update');
        Route::get('/{categoryId}/delete','CategoryController@delete')->name('delete');
        // category.collection routes
        Route::name('collection.')
        ->prefix('{categoryId}/collection')
        ->group(function (){
            Route::get('/','CollectionController@index')->name('index');
            Route::post('/register','CollectionController@register')->name('register');
            Route::post('/{collectionId}/update','CollectionController@update')->name('update');
            Route::get('/{collectionId}/delete','CollectionController@delete')->name('delete');
        
            Route::name('product.')
            ->prefix('/product')
            ->group(function (){
                Route::get('/{collectionId}','ProductController@index')->name('index');
                Route::post('/register','ProductController@register')->name('register');
                Route::post('/{productId}/update','ProductController@update')->name('update');
                Route::get('/{productId}/delete','ProductController@delete')->name('delete');
    
                Route::post('/','ProductController@search')->name('search');
            });
        });

        
    });
});