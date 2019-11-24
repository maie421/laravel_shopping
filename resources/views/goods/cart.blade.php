@extends('layouts.app')

@section('content')
<style>
#join_top {
	width:1058px;
	margin:0 auto;
	padding:40px 0;
	margin-bottom:25px;
}
#join_title {
	font-size:24px;
	color:#111;
	font-weight:bold;
	float:left;
}
#join_left {
	color:#bdbcbc;
	font-size:16px;
	padding-top:8px;
	float:right;
}
#red_color1 {
	color:#D34E3B;
}
table,th,td{
	border-collapse: collapse;
}
th{
	background-color:#f7f7f7;
	border-top:1px solid #717171;
	border-bottom:1px solid #dbdbdb;
}
td{
	border-bottom:1px solid #dbdbdb;
}
td a{
	color:#717171;
	text-decoration:none;
}
td a:hover{
	text-decoration:underline;
}
.notice{
	padding:10px 20px;
	width:150px;
	font-size:14px;
	color:#717171;
	text-align:center;
}
.notice_title{
	width:473px;
	font-size:14px;
	color:#717171;
	padding:0px 5px;
}
.notice_check{
	width:100px;
	text-align:center;
}
#result{
    margin-top: 40px;
    border: 2px solid #d6d6d6;
    padding: 40px 20px;
    text-align: right;
    vertical-align: middle;
    color: #828282;
    clear: both;
}
#result_img{
	width:30px;
	margin:0 5px -10px 5px;
}
#basket_img{
	margin:10px 20px 10px 10px;
	width: 72px;
    border: 1px solid #a7a7a7;
	float:left;
}
#basket_img_name{
	float:left;
	margin:10px 5px;
}
#deduction{
	padding:2px;
	margin:5px 0;
	background-color:#ff4c2e;
	color:white;
	width:42px;
	font-size:11px;
}
#basket_input{
	width:30px;
	border: 1px solid #a7a7a7;
	text-align:center;
}
#basket_delete,#basket_select_buy{
	width:81px;
	padding:6px 12px;
	font-size:12px;
	background-color:white;
	color:#666666;
	border:1px solid #a3a3a3;
	font-weight:bold;
}
#basket_delete{
	float:left;
	width:100px;
}
#basket_delete:hover,#basket_select_buy:hover{
	color:#6b6b6b;
	border:1px solid #6b6b6b;
	cursor:pointer;
}
#basket_buy{
	float:right;
}
#basket_select_buy{
	margin-right:14px;
}
#basket_select_buy,#basket_full_buy{
	width:190px;
	padding:20px 0;
	text-align:center;
	font-size:14px;
	float:left;
}
#basket_full_buy{
	background-color:#2c2c2c;
	border:1px solid #2c2c2c;
	color:white;
}
#basket_full_buy:hover{
	background-color:#6b6b6b;
	border:1px solid #6b6b6b;
	cursor:pointer;
}
#basket_buy,#basket_delete{
	margin:18px 0 95px 0;
}
#red_color{
	margin-top:10px;
	width:328px;
	font-size:12px;
	color:#D34E3B;
	float:right;
}
</style>
<div class="container">
<div id="join_top">
		<div id="join_title">
			장바구니
		</div>
		<span id="join_left"><span id="red_color1">01장바구니 > </span>02주문서작성/결제 > 03주문완료</span>
	</div>
    <table>
    <tr>
      <th class="notice">상품/옵션 정보</th> 
      <th class="notice">수량</th>
      <th class="notice">상품금액</th>
      <th class="notice">합계금액</th>
      <th class="notice">배송일정</th>
      <th class="notice">삭제</th>
    </tr>
    @if(session('cart'))
    @foreach(session('cart') as $id => $details)
    <?php $total = 0 ?>
    <tr>
        <td class="notice_title" ><a href="#"><img src="{{ $details['path'] }} " id="basket_img"></a>
        <div id="basket_img_name">{{ $details['name'] }}</div></td>
        <form method="post" action="/goods/updatecart/{{$id}}"><!--총금액 새로고침-->
        <?php $total += $details['price'] * $details['quantity'] ?>
        <td class="notice"><input type="text" id="basket_input" value="{{ $details['quantity'] }}" name="quantity"></td>
        <td class="notice">{{ $details['price'] }}</td>
        <td class="notice">{{$total}}</td>
        <td class="notice">배송일정</td>
        <td class="actions">
            {{csrf_field()}}
            {{method_field('patch')}}
            <button class="btn btn-info btn-sm update-cart" style="float:left;margin:0 30px"><i class="fa fa-refresh"></i></button>
            </form><!--초기화-->
            <form method="post" action="/goods/Deletecart/{{$id}}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button class="btn btn-danger btn-sm remove-from-cart" style="float:left;"><i class="fa fa-trash-o"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
    @endif
    <table>
  <div id="basket_buy">
    <input type="submit" id="basket_full_buy" onclick="button_event2()" style="width:200px;" value="선택 상품 주문">
  </div>
</div>
@endsection