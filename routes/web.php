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
    'as'   => 'admin-home',
    'uses' => 'MyController@getHomePage'
]);

Route::get('portfolio', [
    'as'   => 'admin-portfolio',
    'uses' => 'MyController@getPortfolioPage'
]);

// route thêm danh mục
Route::GET('/add-portfolio', [
    'as'   => 'admin-add-portfolio',
    'uses' => 'MyController@AddPortfolio'

]);
// Chèn danh mục
Route::POST('/insert-portfolio', [
    'as' => 'insert-portfolio',
    'uses' => 'MyController@InsertPortfolio'
]);
Route::GET('/insert-portfolio', [
    'as' => 'insert-portfolio',
    'uses' => 'MyController@InsertPortfolio'
]);
// route hiển thị thông tin danh mục
Route::GET('/show-portfolio/{portfolio_id}', [
    'as'   => 'admin-show-portfolio',
    'uses' => 'MyController@ShowPortfolio'
]);
// route sản phẩm
Route::GET('/product', [
    'as'   => 'admin-product',
    'uses' => 'MyController@getProductPage'
]);
// route thêm sản phẩm
Route::GET('/add-product', [
    'as' => 'admin-add-product',
    'uses' => 'MyController@AddProduct'
]);
// route thông tin sản phẩm
Route::GET('/show-product/{product_id}', [
    'as' => 'admin-show-product',
    'uses' => 'MyController@ShowProduct'
]);
// route thể loại
Route::GET('/category', [
    'as'   => 'admin-category',
    'uses' => 'MyController@getCategoryPage'
]);
// route hiển thị thông tin thể loại

// thêm thể loại
Route::GET('/add-category', [
    'as' => 'admin-add-category',
    'uses' => 'MyController@AddCategory'
]);
// chèn thể loại
Route::GET('/insert-category', [
    'as' => 'insert-category',
    'uses' => 'MyController@InsertCategory'
]);
// xem thông tin thể loại
Route::GET('/show-category/{category_id}', [
    'as' =>'admin-show-category',
    'uses' => 'MyController@showCategory'
]);



// ROUTE CUSTOMER
Route:: get('/index', [
    'as'   => 'home',
    'uses' => 'MyController@getindex'
] );
Route::get('/cart',[
    'as'   => 'cart',
    'uses' => 'MyController@getcart'
]);
Route:: get('/detailproduct/{id}', 'MyController@detailproduct');
Route:: get('/seeadd/{id}', [
    'as'   => 'see',
    'uses' => 'MyController@getsee'
]);
Route::get('/cart/{id}', 'MyController@addcart');
Route::get('/delete/{id}','MyController@getdelete');
Route::get('/xoa', 'MyController@deletecart');
Route::get('/update','MyController@updatecart');
Route::post('/update','MyController@updatecart');
Route::get('/buy','MyController@buy');
Route::get('/author/{author}','MyController@getauthor');
Route::post('/feedback',['as'=>'feedback','uses'=>'MyController@feedback']);
