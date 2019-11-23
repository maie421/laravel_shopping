<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\goods;
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
        return view('/goods/meat');
    }
    public function goods(Request $request)
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
        $imges=new goods();
        $imges->name=$request['name'];
        $imges->content="sdf";
        $imges->price=$request['price'];
        $imges->path="https://shoppi.s3.ap-northeast-2.amazonaws.com/images".$filePath;
        // $imges->path="asdf";
        $imges->save();

        return view('/goods/meat');
    }
    public function destroy($image)
    {
        Storage::disk('s3')->delete('images/' . $image);
        return back()->withSuccess('Image was deleted successfully');
    }
}
