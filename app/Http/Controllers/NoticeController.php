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
}
