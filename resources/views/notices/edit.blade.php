@extends('layouts.app')

@section('content')
<style>
.content_main{
    float: left;
    margin-left:30px;
    width:850px;
}
</style>
<div class="container" style="margin-top:40px;">
    <div class="side_menu" style="width:200px; float:left;">
        <!-- 사이드 바 메뉴-->
        <!-- 패널 타이틀1 -->
        <div class="panel panel-info" >
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
    <form method="post" action="/update/{{$notices->id}}">
        @csrf
        @method('PUT')
        <div class="mb-3">

            <label for="title">제목</label>

            <input type="text" class="form-control" name="title" id="title" value="{{$notices->subject}}">

        </div>
        <div class="mb-3">

            <label for="content">내용</label>

            <textarea class="form-control" rows="5" name="content" id="content">{{$notices->content}}</textarea>

        </div>
        <!-- <input type="hidden" name="email" value="{{Auth::user()->email}}">
        <input type="hidden" name="name" value="{{Auth::user()->name}}"> -->

        <!-- <div class="mb-3">

            <label for="tag">TAG</label>

            <input type="text" class="form-control" name="tag" id="tag" placeholder="태그를 입력해 주세요">

        </div> -->
    <div>
        <button type="submit" class="btn btn-sm btn-primary" style="float:left;"id="btnList">수정</button>
    </form>
    <form action="/delete/{{$notices->id}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-sm btn-primary"style="float:left; margin:0 5px;" id="btnList">삭제</button>
        <a href="/notices/index"><button type="button"style="float:left;" class="btn btn-sm btn-primary" id="btnList">목록</button></a>     
    </div>
    </form>
</div>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection