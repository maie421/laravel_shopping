@extends('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')
<style>
    #img_size{
	margin:80px 57px 40px 45px;
	width:450px;
	float:left;
}
#menu_name{
	font-size:21px;
	margin:0px 0 10px 0;
	font-weight:bolder;
	color:black;
}
#maine_side{
	margin:80px 0 0 0;
	width:388px;
	height:auto;
	color: #858585;
    font-size: 14px;
	float:left;

}
hr{
	margin-top:15px;
}
#purchase{
	line-height:43px;
}
#red,#red_result{
	color:#d34e3b;
	font-size:18px;
	font-weight:bold;
	font-family:arial;
}
#result{
	margin-top:10px;
	padding:30px 35px 30px 25px;
	font-weight:bolder;
	background-color:#f5f5f5;
	font-size:13px;
	color:black;
	border-bottom:2px solid black;
	border-top:1px solid #e9e9e9;
}
#number_box{
	float:right;
	margin-top:-10px;
}
#number_button_box{
	width:10px;
	float:left;
}
#number{
	width:50px;
	height:30px;
	float:left;
	border:1px solid #cccccc;
	text-align:center;
}
#number_button{
	float:left;
	width:24px;
	height:14px;
	font-size:12px;
	text-align:center;
	background-color:white;
	border:none;
	border:1px solid #cccccc;
}
#full_result{
	margin:30px 10px;
	padding-top:10px;
	font-size:13px;
	font-weight:bold;
	float:right;
	color:black;
	border-top:1px solid #dbdbdb;
}
#red_result{
	font-size:24px;

}
#shoppingbasket{
	width:388px;
	background-color:#303030;
	color:white;
	border:none;
	padding:12px 0px;
}
.purchase ,.purchase_free{
	float:left;
	margin-top:10px;
	background-color:white;
	border:1px solid #dedede;
	color:black;
	width:185px;
	padding:13px 0;
}
.purchase_free{
	margin-right:17px;
}
#detail{
	width:900px;
	float:left;
	background-color:red;
}
#item_cell_item_discount {
    background-color: #CA171D;
	position: absolute;
    padding-top: 20px;
    left: 385px;
    top: 80px;
    width: 110px;
    height:90px;
    text-align: center;
    font-size: 30px;
    font-weight: 800;
    color: #fff;
}
</style>
<div class="container" style="margin-top:-40px; width:1000px;" >
<img src="http://study421.dothome.co.kr/html/management/1000000959_detail_054.jpg" id="img_size">
  <div id="maine_side" >
    <div id="menu_name">가지</div>
    가지가 좋아요
    <hr>
    <ul id="purchase">
      <li><b>소비자가</b> <del> &nbsp;5000</del></li>
      <li><b>판매가 &nbsp;	<span id="red">5000</span></b>원</li>
      <li><b>구매제한</b> &nbsp;최소 1개</li>
      <li><b>배송비</b> &nbsp;	조건부무료(50,000원 미만 구입시 3,000원)</li>
      <li><b>가능배송</b> &nbsp;우체국 택배 / 모닝 배송</li>
    </ul>
    <div id="result">
      가지
      <span id="number_box">
        <input type="text" id="number" value="1" name="quantity">
        <div id="number_button_box">
          <div id="number_button">∧</div>
          <div id="number_button">∨</div>
        </div>
      </span>
    </div>
    <div id="full_result"></div>
	<input type='button' id='shoppingbasket' value='장바구니에 담기' >
  </div>
</div>

@endsection