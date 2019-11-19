@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px;width:500px;">

    <h3 style="margin-bottom:30px;">내용</h3>
        {{ csrf_field() }}

        <div class="mb-3">

            <label for="title">제목</label>

            {{$notices->subject}}

        </div>
        <div class="mb-3">

            <label for="content">내용</label>
            {{$notices->content}}
        </div>

    <div >

        <a href="/notices/edit/{{$notices->id}}"><button type="buttom" class="btn btn-sm btn-primary" id="btnList">수정</button></a>
        <button type="button" class="btn btn-sm btn-primary" id="btnList">목록</button>

    </div>
</div>

@endsection