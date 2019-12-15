@extends('layouts.app')

@section('content')

<style>

.content_main{
    float: left;
    margin-left:30px;
    width:800px;
}
#search{
	margin-top:37px;
    margin-bottom:20px;
	background-color:#f7f7f7;
	border-top:1px solid #e8e8e8;
	border-bottom:1px solid #e8e8e8;
	padding:5px 0;
	text-align:center;
}
#search_select,#search_text{
	padding:5px;
	border:1px solid #d0d0d0;
}
#search_text{
	width:280px;
}
#search_button,.write_button{
	background-color:#979797;
	color:white;
	border:none;
	padding:6px 10px;
}
</style>
    <div class="container" >
    <div class="side_menu" style="width:200px; float:left;">
        <!-- 사이드 바 메뉴-->
        <!-- 패널 타이틀1 -->
        <div class="panel panel-info" style="margin-top:30px;">
          <div class="panel-heading">
            <h3 class="panel-title">고객센터</h3>
          </div>
          <!-- 사이드바 메뉴목록1 -->
          <ul class="list-group">
              <li class="list-group-item">공지사항</li>
          </ul>
        </div>
    </div>
    <div class="content_main">
        <h3>공지사항</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>번호</th>
                <th style="width:470px">제목</th>
                <th>작성자</th>
                <th>날짜</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=$notices->total() ?>
                @foreach ($notices as $notice)
                <tr>
                    <td><?=$i--?></td>
                    <td><a href="/show/{{$notice->id}}">{{$notice->subject}}</a></td>
                    <td>{{$notice->name}}</td>
                    <td>{{$notice->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- 검색어 -->
        <div id="search">
        <form method="get" action="/notices/index" >
      <select id="search_select" name="find">
        <option value="">전체</option>
        <option value="subject">제목</option>
        <option value="content">내용</option>
        <option value="d">작성자</option>
      </select>
      <input type="text" id="search_text" name="search_text">
      <input type="submit" id="search_button" value="검색" >
      </form>
    </div>
        <!-- 검색어 -->
        <?php Auth::user()?$UserEmail=(Auth::user()->email):$UserEmail=NULL?>
        <?php if($UserEmail){ ?>
        <a href="/writing" class="btn btn-default pull-right">글쓰기</a>
        <?php } ?>
        <div class="text-center">
        {{ $notices->links() }}
        </div>
        <!-- {{print_r($notices)}} -->
        
    </div>
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection