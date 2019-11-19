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
Route::get('/writing',function(){
    return view('/notices/writing');
});

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
    error_log($request['name']);
    $notice->save();

    return redirect('/notices');
});
// Route::get('/notices', 'NoticesController@index');
// Route::get('/join',function(){
//     return view('join');
// });
// Route::get('/product',function(){
//     return view('product');
// });