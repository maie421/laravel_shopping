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
            <h3 class="panel-title">마이페이지</h3>
          </div>
          <!-- 사이드바 메뉴목록1 -->
          <ul class="list-group">
              <li class="list-group-item"><a href="/mypage/order">주문사항</a></li>
          </ul>
        </div>
    </div>
    <div class="content_main">
        <h3>상세주문서</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width:470px">상품</th>
                <th>수량</th>
				<th>상품금액</th>
				<th>합계금액</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order as $orders)
                <tr>
                    <td>{{$orders->goods_name}}</td>
                    <td>{{$orders->num}}</td>
					<th>{{$orders->money}}</th>
					<?php $total=$orders->money * $orders->num ?>
					<th>{{$total}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection