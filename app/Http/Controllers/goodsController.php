<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\goods;
use DB;

class goodsController extends Controller
{
    public function index()
    {
    if (request()->sort == 'low_high') {
        $goods=DB::table('goods')->orderBy('price')->paginate(9);
    }else if(request()->sort == 'high_low'){
        $goods=DB::table('goods')->orderBy('price','desc')->paginate(9);
    }else{
        $goods=DB::table('goods')->orderBy('id', 'desc')->paginate(9);
    }
        return view('/goods/meat',['goods'=>$goods]);
    }
    public function sore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048',
            'content' => 'required',
            'price'=>'int'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file),'public');
        }
        DB::table('goods')->insert([
            'name' =>$request['name'],
            'content' => $request['content'],
            'price'=>$request['price'],
            'path'=>'https://shoppi.s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com' . env('AWS_BUCKET') . '/'.$filePath
        ]);
        return redirect('/goods/meat');
    }
    public function destroy($image)
    {
        Storage::disk('s3')->delete('images/' . $image);
        return back()->withSuccess('Image was deleted successfully');
    }
    public function product($id){
        $product=goods::find($id);
        return view('/goods/product',['product'=>$product]);
    }
    public function addToCart($id)
    {
        $product = goods::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "path" => $product->path
                    ]
            ];
 
            session()->put('cart', $cart);
            
            return redirect('/goods/cart');
        }
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect('/goods/cart');
 
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "path" => $product->path
        ];
        session()->put('cart', $cart);
 
        return redirect('/goods/cart');
    }
    public function Deletecart($id){
        $cart = session()->get('cart');
 
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect('/goods/cart');
    }
    public function updatecart($id,Request $request){

        $cart=session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect('/goods/cart');
    }
}
