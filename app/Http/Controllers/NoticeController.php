<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    public function index(){
       $notice=DB::table('notices')
       ->orderBy('created_at', 'desc')
       ->paginate(2);
    // $notice = Notice::where('name', '=', '윤영미')->paginate(15);
       return view('/notices/index',['notices'=>$notice]);
    }
    public function NoticeEdit($id,Request $request){
       return view('/notices/edit'.$id);
    }
    public function getNoticeById($id){
       $notices=new Notice();
       $result=$notices->find($id);

       return view('/notices/show',['notices'=>$result]);
    }
    public function getNoticeEdit($id){
        $notices=new Notice();
        $result=$notices->find($id);

        return view('/notices/edit',['notices'=>$result]);
    }
    public function updateNoticeById($id,Request $request){
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|max:100',
        //     'content' => 'required|max:5000',

        // ]);
        // // if error

        $notices=new Notice();
        $result=$notices->find($id);

        if (isset($request['title'])) {
	        $result->subject = $request['title'];
	    }
	    if (isset($request['content'])) {
	        $result->content = $request['content'];
        }
        $result->update();
        return view('/notices/show',['notices'=>$result]);
        
    }
    
}
