<?php

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

use Illuminate\Support\Facades\Route;
Route:: get('/', function () {
    return view('welcome');
});
Route:: get('/index', [
    'as'=>'home',
    'uses'=>'MyController@getindex'
] );
Route::get('/cart',[
    'as'=>'cart',
    'uses'=>'MyController@getcart'
]);
Route::get('/detailproduct/{id}', 'MyController@detailproduct');
Route::get('/seeadd/{id}', [
    'as'=>'see',
    'uses'=>'MyController@getsee'
]);
