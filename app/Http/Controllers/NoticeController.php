<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    public function index(Request $request){
        if($request['find']==='subject'){
            $search_text=$request['search_text'];
            $notice=DB::table('notices')
                ->where('subject', 'LIKE', "%$search_text%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);  
        }else if($request['find']==='name'){
            $search_text=$request['search_text'];
            $notice=DB::table('notices')
                ->where('name', 'LIKE', "%$search_text%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);  
        }else if($request['find']==='content'){
            $search_text=$request['search_text'];
            $notice=DB::table('notices')
                ->where('content', 'LIKE', "%$search_text%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);  
        }else{
                $notice=DB::table('notices')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }
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
    public function deleteNoticeById($id)
    {
        // find task
    	$notices = Notice::find($id);
    	// delete
        $notices->delete();
        return redirect('/notices/index');
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
