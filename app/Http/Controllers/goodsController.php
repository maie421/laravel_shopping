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
        // $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        // $images = [];
        // $files = Storage::disk('s3')->files('images','public');
        //     foreach ($files as $file) {
        //         $images[] = [
        //             'name' => str_replace('images/', '', $file),
        //             'src' => $url . $file
        //         ];
        //     }
    $goods=DB::table('goods')
        ->orderBy('id', 'desc')
        ->paginate(9);
        return view('/goods/meat',['goods'=>$goods]);
    }
    public function sore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048'
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
            'path'=>'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/'.$filePath
        ]);
        // $imges->name=$request['name'];
        // $imges->content=$request['content'];
        // $imges->price=$request['price'];
        // $imges->path='https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/'.$filePath;
        // // $imges->path="asdf";
        // $imges->save();

        // return view('/goods/meat');
        return back();
    }
    public function destroy($image)
    {
        Storage::disk('s3')->delete('images/' . $image);
        return back()->withSuccess('Image was deleted successfully');
    }
    public function product($id){
        $product=goods::find($id);
        // $product=DB::table('goods')->where('id',$id);
        return view('/goods/product',['product'=>$product]);
    }
}
