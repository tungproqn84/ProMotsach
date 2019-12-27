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
    return view('customer/welcome');
});


// ROUTE ADMIN

Route::get('admin', [
    'as' => 'admin-home',
    'uses' => 'MyController@getHomePage'
]);

Route::get('portfolio', [
    'as' => 'admin-portfolio',
    'uses' => 'MyController@getPortfolioPage'
]);

// route thêm danh mục
Route::GET('/add-portfolio', [
    'as' => 'admin-add-portfolio',
    'uses' => 'MyController@AddPortfolio',

]);
// route hiển thị thông tin danh mục
Route::GET('show-portfolio/{portfolio_id}', [
    'as' => 'admin-show-portfolio',
    'uses' => 'MyController@ShowPortfolio',

]);

// ROUTE CUSTOMER
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
Route::get('/cart/{id}', 'MyController@addcart');
Route::get('/delete/{id}','MyController@getdelete');
Route::get('/xoa', 'MyController@deletecart');
Route::get('/update','MyController@updatecart');
Route::post('/update','MyController@updatecart');

