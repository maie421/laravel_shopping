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

use Illuminate\Http\Request;
use App\Notice;

Route::get('/', function() {
    return view('home');
});

Auth::routes();

Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/auth/register', 'Auth\RegisterController@register');

Route::post('/auth/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login',function(){
//     return view('login');
// });

// Route::get('/goods/meat',function(){
//     return view('/goods/meat');
// });
Route::get('/goods/product',function(){
    return view('/goods/product');
});
Route::get('/goods/Add',function(){
    return view('/goods/Add');
});
Route::post('/goods/Information', 'goodsController@goods');

Route::get('/goods/meat', 'goodsController@index');
// Route::resource('images', 'goodsController', ['only' => ['goods', 'destroy']]);

Route::get('/notices',function(){
    return view('/notices/index');
});
Route::get('/notices/index', 'NoticeController@index');
Route::get('/writing',function(){
    return view('/notices/writing');
});
Route::get('/show/{id}','NoticeController@getNoticeById');
Route::get('/edit/{id}','NoticeController@getNoticeEdit');
Route::put('/update/{id}','NoticeController@updateNoticeById');
Route::delete('/delete/{id}','NoticeController@deleteNoticeById');


Route::post('/noticesinsert',function(Request $request){
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:100',
        'content' => 'required|max:5000',
        'email' => 'required',
        'name' => 'required',
    ]);
    // if error
    if ($validator->fails()) {
        return 'Error in submitted data.';
    }
    $notice=new Notice();
    if (isset($request['title'])) {
        $notice->subject = $request['title'];
    }
    if (isset($request['content'])) {
        $notice->content = $request['content'];
    }
    if (isset($request['email'])) {
        $notice->email = $request['email'];
    }
    if (isset($request['name'])) {
        $notice->name = $request['name'];
    }
    $notice->save();

    return redirect('/notices/index');
});