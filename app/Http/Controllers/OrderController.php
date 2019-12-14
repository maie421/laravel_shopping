<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;

class OrderController extends Controller
{
    public function index(){
        error_log('2');
        return view('/order/orderConfirm');
    }
    public function order(Request $request){
        foreach(session('cart') as $id => $details){
            $order=new order;
            $order->user()->associate($request->user());
            $order->goods_name=$details['name'];
            $order->num=$details['quantity'];
            $order->money=$details['price'];
            $order->img=$details['path'];
            $order->save();
        }
        $request->session()->forget('cart');
        return redirect('/');
    }
}
