<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        $comment->user()->associate($request->user());
        $post = goods::find($request->get('post_id'));
        $id=$request->get('post_id');
        $post->comments()->save($comment);
        // return view('/goods/product/1');
        // return redirect('/goods/product/{id}');
        // return redirect()->route('/goods/product/1', ['id' => 1]);
        return redirect('/goods/product/'.$id);
    }
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        error_log($request->get('comment_id'));
        $reply->parent_id = $request->get('comment_id');
        $post = goods::find($request->get('post_id'));
        $post->comments()->save($reply);
        return back();
    }
}
