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

// 로그인,로그아웃
Auth::routes();
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/auth/register', 'Auth\RegisterController@register');
Route::post('/authLogout',function(){
    Auth::logout();
    return redirect('/home');
});
// 깃허브 로그인
// Route::get('auth/github', 'Auth\SocialController@redirectToProvider');
// Route::get('auth/github/callback', 'Auth\SocialController@handleProviderCallback');
Route::get('/auth/redirect/{provider}', 'Auth\SocialController@redirect');
Route::get('/callback/{provider}', 'Auth\SocialController@callback');

// 메인 페이지
Route::get('/', function() {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');

//물건
Route::get('/goods/product/{id}','goodsController@product');
Route::get('/goods/Add',function(){
    return view('/goods/Add');
});
Route::post('/goods/Information', 'goodsController@sore');
Route::get('/goods/meat', 'goodsController@index');

//장바구니 부분
Route::get('/goods/cart', function(){
    return view('/goods/cart');
});
Route::get('/goods/Addcart/{id}', 'goodsController@addToCart');
Route::delete('/goods/Deletecart/{id}', 'goodsController@Deletecart');
Route::patch('/goods/updatecart/{id}', 'goodsController@updatecart');
//상품 후기
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::get('/goods/ProjectWrite/{id}','CommentController@index')->name('index.add');

//결제
Route::get('/goods/checkout', 'checkController@index')->name('checkout.index');
Route::get('/goods/checkout', 'checkController@index')->name('checkout.index');

//PayPal
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
//주문
Route::post('/goods/order','OrderController@order');
Route::get('/order/orderConfirm/{day}','OrderController@index');//주문 페이지
Route::get('/mypage/order','OrderController@MypageOrder');

//게시판
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
//