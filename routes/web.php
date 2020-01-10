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
Route::get('/bill/{id}','MyController@ShowBill');

Route::get('/admin', [
    'as'   => 'admin-home',
    'uses' => 'MyController@getHomePage'
]);
// trang khách hàng
Route::get('/customer', [
    'as'   => 'admin-customer',
    'uses' => 'MyController@getCustomerPage'
]);

Route::get('/portfolio', [
    'as'   => 'admin-portfolio',
    'uses' => 'MyController@getPortfolioPage'
]);

// thêm danh mục
Route::GET('/add-portfolio', [
    'as'   => 'admin-add-portfolio',
    'uses' => 'MyController@AddPortfolio'

]);
// Chèn danh mục
Route::POST('/insert-portfolio', [
    'as'   => 'insert-portfolio',
    'uses' => 'MyController@InsertPortfolio'
]);
Route::GET('/insert-portfolio', [
    'as'   => 'insert-portfolio',
    'uses' => 'MyController@InsertPortfolio'
]);
// route hiển thị thông tin danh mục
Route::GET('/show-portfolio/{portfolio_id}', [
    'as'   => 'admin-show-portfolio',
    'uses' => 'MyController@ShowPortfolio'
]);
// xóa danh mục
Route::GET('delete-portfolio/{portfolio_id}', [
    'as'   => 'admin-delete-portfolio',
    'uses' => 'MyController@DeletePortfolio'
]);
// sửa danh mục sản phẩm
Route::GET('edit-portfolio/{portfolio_id}', [
    'as' => 'admin-edit-portfolio',
    'uses' => 'MyController@EditPortfolio'
]);
// route sửa danh mục sản phẩm
Route::GET('update-portfolio', [
    'as' => 'update-portfolio',
    'uses' => 'MyController@UpdatePortfolio'
]);
Route::POST('update-portfolio', [
    'as' => 'update-portfolio',
    'uses' => 'MyController@UpdatePortfolio'
]);
// route sản phẩm
Route::GET('/product', [
    'as'   => 'admin-product',
    'uses' => 'MyController@getProductPage'
]);
// Route::get('/login',['as'=>'login','uses'=>'MyController@getlogin']);
// Route::post('/login','mycontrollerMyController@postlogin');
// Route::get('/dangki',['as'=>'signin','uses'=>'MyController@getsignin']);
// Route::post('/dangki','MyController@postsignin');
// route thêm sản phẩm
Route::GET('/add-product', [
    'as'   => 'admin-add-product',
    'uses' => 'MyController@AddProduct'
]);
// route thông tin sản phẩm
Route::GET('/show-product/{product_id}', [
    'as'   => 'admin-show-product',
    'uses' => 'MyController@ShowProduct'
]);
// xóa sản phẩm
Route::GET('delete-product/{product_id}', [
    'as'   => 'admin-delete-product',
    'uses' => 'MyController@DeleteProduct'
]);
// chèn thể loại
Route::GET('/insert-product', [
    'as'   => 'insert-product',
    'uses' => 'MyController@InsertProduct'
]);
Route::POST('/insert-product', [
    'as'   => 'insert-product',
    'uses' => 'MyController@InsertProduct'
]);
// sửa sản phẩm
Route::GET('/edit-product/{product_id}', [
    'as'   => 'admin-edit-product',
    'uses' => 'MyController@EditProduct'
]);
// update product
Route::GET('/update-product', [
    'as' => 'update-product',
    'uses' => 'MyController@UpdateProduct'
]);
Route::POST('/update-product', [
    'as' => 'update-product',
    'uses' => 'MyController@UpdateProduct'
]);

// route thể loại
Route::GET('/category', [
    'as'   => 'admin-category',
    'uses' => 'MyController@getCategoryPage'
]);
// route hiển thị thông tin thể loại

// thêm thể loại
Route::GET('/add-category', [
    'as'   => 'admin-add-category',
    'uses' => 'MyController@AddCategory'
]);
// chèn thể loại
Route::GET('/insert-category', [
    'as'   => 'insert-category',
    'uses' => 'MyController@InsertCategory'
]);
Route::POST('/insert-category', [
    'as'   => 'insert-category',
    'uses' => 'MyController@InsertCategory'
]);
// xem thông tin thể loại
Route::GET('/show-category/{category_id}', [
    'as'   => 'admin-show-category',
    'uses' => 'MyController@showCategory'
]);
// xóa thể loại sản phẩm
Route::GET('delete-category/{category_id}', [
    'as'   => 'admin-delete-category',
    'uses' => 'MyController@DeleteCategory'
]);
// sửa thể loại sản phẩm
Route::GET('edit-category/{category_id}', [
    'as'   => 'admin-edit-category',
    'uses' => 'MyController@EditCategory'
]);


// trang hóa đơn
Route::GET('/bill', [
    'as'   => 'admin-bill',
    'uses' => 'MyController@getBillPage'
]);
// Thông tin đơn hàng
Route::GET('/show-bill/{bill_id}', [
    'as'   => 'admin-show-bill',
    'uses' => 'MyController@ShowBill'
]);

// ROUTE CUSTOMER
Route:: get('/', [
    'as'   => 'home',
    'uses' => 'MyController@getindex'
] );
Route:: get('/index', [
    'as'   => 'home',
    'uses' => 'MyController@getindex'
] );
Route::get('/cart', [
    'as'   => 'cart',
    'uses' => 'MyController@getcart'
]);
Route:: get('/detailproduct/{id}', 'MyController@detailproduct');
Route:: get('/seeadd/{id}', [
    'as'   => 'see',
    'uses' => 'MyController@getsee'
]);
Route:: get('/cart/{id}', 'MyController@addcart');
Route:: get('/delete/{id}', 'MyController@getdelete');
Route:: get('/xoa', 'MyController@deletecart');
Route:: get('/update' ,'MyController@updatecart');
Route:: post('/update' ,'MyController@updatecart');
Route:: get('/buy' ,'MyController@buy');
Route:: get('/author/{author}' ,'MyController@getauthor');
Route::get('/feedback' , 'MyController@getfeedback');
Route:: post('/sendfeedback' , ['as'=>'feedback','uses'=>'MyController@feedback']);
Route:: get('/update','MyController@updatecart');
Route:: post('/update','MyController@updatecart');
Route:: get('/buy','MyController@buy');
Route:: get('/author/{author}','MyController@getauthor');
Route:: get('/feedback','MyController@getfeedback');
Route:: post('/sendfeedback',['as'=>'feedback','uses'=>'MyController@feedback']);
Route:: get('/login', ['as' => 'login', 'uses' => 'MyController@getlogin']);
Route:: post('/postlogin', ['as' => 'postlogin', 'uses' => 'MyController@login']);
Route:: get('/logout', ['as' => 'logout', 'uses' =>'MyController@getlogout']);
Route:: get('/signin', ['as' => 'signin', 'uses' => 'MyController@getsignin']);
Route:: post('/postsignin', ['as' => 'postsignin', 'uses' => 'MyController@postsignin']);
Route:: post('/search', ['as'=>'search','uses'=>'MyController@getsearch']);
Route::get('/contact', 'MyController@getcontact');
Route::post('/comment', ['as'=>'comment', 'uses'=>'MyController@postcomment']);
Route::post('/contact', ['as'=>'contact','uses'=>'MyController@contact']);
Route:: get('/theloai/{id}' ,'MyController@getcategory');
Route:: get('/group/{id}' ,'MyController@getportfolio');
Route:: post('/search',['as'=>'search','uses'=>'MyController@getsearch']);
Route:: get('/contact', 'MyController@getcontact');
