@extends('layouts.app')

@section('content')

<style>
.content_main{
    float: left;
    margin-left:30px;
    width:800px;
}
.in_title{
	border-top:2px solid #717171;
	width:780px;
	padding:15px 20px;
	color: #111;
    font-size: 14px;
	font-weight:bold;
	background-color:#f7f7f7;
}
.in_side{
	padding:12px 20px;
	width:780px;
	border-top:1px solid #dbdbdb;
	border-bottom:1px solid #dbdbdb;
	font-size:12px;
}
.admin{
	border-right:1px solid #dbdbdb;
	padding-right:10px;
	margin-right:10px;
	font-weight:bold;
}
.num{
	float:right;
}
.content{
	border-bottom:1px solid #dbdbdb;
	padding:20px 10px;
	text-align:center;
	margin-bottom:15px;
	width:800px;
}
#notice_main {
    float:left;
    margin-left:30px;
    margin-top:-30px;
}
</style>
    <div class="container" style="margin-top:30px;">
    <div class="side_menu" style="width:200px; float:left;">
        <!-- 사이드 바 메뉴-->
        <!-- 패널 타이틀1 -->
        <div class="panel panel-info" >
          <div class="panel-heading">
            <h3 class="panel-title">고객센터</h3>
          </div>
          <!-- 사이드바 메뉴목록1 -->
          <ul class="list-group">
              <li class="list-group-item"><a href="#">공지사항</a></li>
            <li class="list-group-item"><a href="#">질문게시판</a></li>
          </ul>
        </div>
    </div>
    <div id="notice_main">
    <h3 style="margin-bottom:20px;">공지사항</h3>
    <div class="in_title">{{$notices->subject}}</div>
    <div class="in_side"><span class="admin">{{$notices->name}}</span>{{$notices->created_at}}</div> 
    <!-- <span class="num"><b>조회수</b>1</span>-->
    <div class="content">{{$notices->content}}</div>
        <hr/>
        <?php if($UserEmail ?? ''===($notices->email)){ ?>
        <a href="/edit/{{$notices->id}}"><button type="submit" class="btn btn-sm btn-primary" id="btnList">수정</button></a>
        <?php } ?>
        <a href="/notices/index"><button type="button" class="btn btn-sm btn-primary" id="btnList">목록</button></a>
        </div><!--notice_main-->  
    </div>
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection