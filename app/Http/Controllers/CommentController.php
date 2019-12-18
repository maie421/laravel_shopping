<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Comment;
use App\goods;

class CommentController extends Controller
{
    public function index(Request $request){
        $id=$request['id'];
        return view('/goods/ProjectWrite',['id'=>$id]);
    }
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->title= $request->get('title');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file),'public');
            $comment->img='https://'. env('AWS_BUCKET') .'.s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/'.$filePath;
        }
        $comment->user()->associate($request->user());
        $post = goods::find($request->get('post_id'));
        $post->comments()->save($comment);
        $id=$request->get('post_id');
        return redirect('/goods/product/'.$id);
    }
    public function replyStore(Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required'
        ]);
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = goods::find($request->get('post_id'));
        $post->comments()->save($reply);
        return back();
    }
}
