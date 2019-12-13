@extends('layouts.app')

@section('content')
<style>
.content_main{
    float: left;
    margin-left:30px;
    width:850px;
}
</style>
<div class="container">
<div class="side_menu" style="width:200px; float:left;">
        <!-- 사이드 바 메뉴-->
        <!-- 패널 타이틀1 -->
        <div class="panel panel-info" style="margin-top:30px;">
          <div class="panel-heading">
            <h3 class="panel-title">고기</h3>
          </div>
          <!-- 사이드바 메뉴목록1 -->
          <ul class="list-group">
              <li class="list-group-item"><a href="#">고기 추가</a></li>
          </ul>
        </div>
    </div>
    <div class="content_main">
    <h3>고기 추가</h3>
    <form method="post" action="{{ url('/goods/Information') }}" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="mb-3">
            <input type="file" name="image">
        </div>
        <div class="mb-3">

            <label for="title">제목</label>

            <input type="text" class="form-control" name="name" id="title" placeholder="제목을 입력해 주세요">

        </div>

        <div class="mb-3">
            <label for="title">금액</label>
            <input type="text" class="form-control" name="price" placeholder="금액"> 
        </div>
        <div class="mb-3">

            <label for="content">내용</label>

            <textarea class="form-control" rows="5" name="content" id="content" placeholder="내용을 입력해 주세요" ></textarea>
        </div>

        <!-- <div class="mb-3">

            <label for="tag">TAG</label>

            <input type="text" class="form-control" name="tag" id="tag" placeholder="태그를 입력해 주세요">

        </div> -->

    

    <div >

    <button type="submit" class="btn btn-sm btn-primary" id="btnList">확인</button>
    </form>
    <a href="#"><button type="button" class="btn btn-sm btn-primary" id="btnList">목록</button></a>
    </div>
    </div>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection