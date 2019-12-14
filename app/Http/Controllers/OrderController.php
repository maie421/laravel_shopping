<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\order;
class OrderController extends Controller
{
    public function MypageOrder(Request $request){
        $order = DB::table('orders')
            ->whereDate('user_id',Auth::id())
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('/mypage/order',['order'=>$order]);
    }
    public function index(){
        error_log('2');
        return view('/order/orderConfirm');
    }
    public function order(Request $request){
        $parent=null;
        foreach(session('cart') as $id => $details){
            $order=new order;
            $order->parent_id=$parent;
            $order->user()->associate($request->user());
            $order->goods_name=$details['name'];
            $order->num=$details['quantity'];
            $order->money=$details['price'];
            $order->img=$details['path'];
            $order->save();
            $parent='1';
        }
        $request->session()->forget('cart');
        return redirect('/');
    }
}
