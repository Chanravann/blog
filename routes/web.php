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

Route::get('/', function () {
    return view('welcome');
});
//create my route
Route::get('about', 'AboutController@index');
Route::view('register', 'register')->name('regi');
Route::post('register/save','RegisterController@save')
        ->name('register.save');
Route::get('uploadfile','UploadController@index');
Route::post('uploadfile/save','UploadController@save');
Route::get('customer',"CustomerController@index");
Route::get('customer/create',"CustomerController@create");
Route::get('customer/search',"CustomerController@search");
Route::get('customer/edit/{id}','CustomerController@edit');
Route::get('customer/delete/{id}',"CustomerController@delete")
    ->name('customer.delete');
Route::post('customer/save','CustomerController@save');
Route::post('customer/update','CustomerController@update');
//route resource
Route::resource('category','CategoryController')
    ->except(['show','destroy']);
Route::get('category/delete/{id}', 'CategoryController@delete')
    ->name('category.delete');
Route::get('category', 'CategoryController@home')
    ->name('category.home');

//students route
Route::resource('student','StudentController')
    ->except(['show','destroy']);
Route::get('student/delete/{id}', 'StudentController@delete');
Route::get('student/search', 'StudentController@search');
Route::get('region', 'RegionController@index');
//login route
// Route::get('login', 'UserController@login');
// Route::post('login/dologin', 'UserController@do_login');
// Route::get('logout', 'UserController@logout');

//authentication route
Route::get('login-form', 'LoginController@login_form')
    -> name('login');
Route::post("login-form/do-login", "LoginController@do_login");
Route::get('logout', 'UserController@do_logout');
//product
Route::resource('product', 'ProductController')
    ->except(['destroy']);
Route::get('product/delete/{id}', "ProductController@delete")
    ->name('product.delete');
//user
Route::resource('user', 'UserController')
    ->except(['destroy', 'show']);
Route::get('user/delete/{id}', 'UserController@delete')
    ->name('user.delete');