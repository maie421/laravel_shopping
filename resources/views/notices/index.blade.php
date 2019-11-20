@extends('layouts.app')

@section('content')

<style>
.content_main{
    float: left;
    margin-left:30px;
    width:800px;
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
              <li class="list-group-item"><a href="#">공지사항</a></li>
            <li class="list-group-item"><a href="#">질문게시판</a></li>
          </ul>
        </div>
    </div>
    <div class="content_main">
        <h2>공지사항</h2>
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
                @foreach ($notices as $notice)
                <tr>
                    <td>{{$notice->id}}</td>
                    <td><a href="/show/{{$notice->id}}">{{$notice->subject}}</a></td>
                    <td>{{$notice->name}}</td>
                    <td>{{$notice->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr/>
        <a href="/writing" class="btn btn-default pull-right">글쓰기</a>
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