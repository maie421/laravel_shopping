@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px;">

    <h2>글쓰기</h2>

    <form method="post" action="/noticesinsert">
        {{ csrf_field() }}

        <div class="mb-3">

            <label for="title">제목</label>

            <input type="text" class="form-control" name="title" id="title" placeholder="제목을 입력해 주세요">

        </div>
        <div class="mb-3">

            <label for="content">내용</label>

            <textarea class="form-control" rows="5" name="content" id="content" placeholder="내용을 입력해 주세요" ></textarea>

        </div>

        <input type="hidden" name="email" value="{{Auth::user()->email}}">
        <input type="hidden" name="name" value="{{Auth::user()->name}}">

        <!-- <div class="mb-3">

            <label for="tag">TAG</label>

            <input type="text" class="form-control" name="tag" id="tag" placeholder="태그를 입력해 주세요">

        </div> -->

    

    <div >

    <button type="submit" class="btn btn-sm btn-primary" id="btnList">확인</button>
        <button type="button" class="btn btn-sm btn-primary" id="btnList">목록</button>

    </div>
    </form>
</div>

@endsection