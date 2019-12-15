<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\order;
class OrderController extends Controller
{
    public function MypageOrder(){
        $order = DB::table('orders')
            ->where('user_id','=',Auth::id())
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('/mypage/order',['order'=>$order]);
    }
    public function index($day){
        $order = DB::table('orders')
            ->where([
               ['group', '=',$day],
               ['user_id', '=', Auth::id()],
            ])->get();
        return view('/order/orderConfirm',['order'=>$order]);
    }
    public function order(Request $request){
        $parent=null;
        foreach(session('cart') as $id => $details){
            $order=new order;
            $order->parent_id=$parent;
            $order->group=date('YmdHis');
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
