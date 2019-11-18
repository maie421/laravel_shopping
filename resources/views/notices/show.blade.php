@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="/notices" class="btn btn-default">Go back</a>
        <h4>안녕</h4>
        <h5>Notice for team 10</h5>
        <div>
            내용
        </div>
        <small>Written on 날짜</small> 
        <a href="/notices/{{$notice->id}}/edit" class="btn btn-default">Edit</a>
        {!!Form::open(['action' => ['NoticesController@destroy', $notice->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>

@endsection