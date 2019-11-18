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

Route::get('/', function() {
    return view('home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login',function(){
//     return view('login');
// });

Route::get('/meat',function(){
    return view('meat');
});

Route::get('/notices',function(){
    return view('/notices/index');
});


// Route::get('/notices', 'NoticesController@index');
// Route::get('/join',function(){
//     return view('join');
// });
// Route::get('/product',function(){
//     return view('product');
// });