@extends('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')
<style>
    #select{
	width:1100px;
	font-size:13px;
	margin:0 auto;
	margin-bottom:5px;
	color:#535353;
	text-align:right;
}
#select_option{
	width:160px;
	padding:2px;
	border:1px solid #cccccc;
	color:#535353;
	margin:20px 0 5px 5px;
}
#menu_banner{
	width:100%;
	height:270px;
	margin-bottom:35px;
}
.menu_banner{
	width:100%;
	margin:0 auto;
}
#full{
	font-size:14px;
}
#line_list li{
	display:inline;
    margin-right:35px;
	font-size:13px;
}
#line a{
	color:#717171;
	text-decoration:none;
}
#line{
	border-top:1px solid #717171;
    border-bottom:1px solid #dadada;
}
#img_size{
	width:290px;
	height:290px;
}
/* #img_size:hover{
	border:4px solid  #ca171d;
	margin:-4px;
} */
#list_box{
	width:290px;
	font-size:12px;
	color:#888888;
    float:left;
    margin:0 30px;
	padding-top:40px;
    border-bottom:1px solid #d4d4d4;
	position:relative;
}
#menu_name{
	font-size:13px;
	margin:10px 0 15px 0;
	font-weight:bold;
	color:black;
}
#color{
	color:#d34e3b;
	font-weight:bolder;
	font-size:18px;
	float:right;
	margin:20px 15px 20px 0;
	font-family: arial;
}
.notice{
	padding:10px 0;
	width:82px;
	font-size:14px;
	color:#717171;
	text-align:center;
}
.notice_title,#member_email{
	font-size:14px;
	color:#717171;
}
.notice_title{
	width:530px;
}
.number_page_center{
	width: 1058px;
	margin-top:480px;
	text-align:center;
	clear:both;
}
.number_page_center ul li{
	padding:5px;
	display:inline;
}
.number_page_center ul li a{
	color:#717171;
	text-decoration:none;
}
#number_page{
	margin:0 auto;
	margin-top:20px;
	width:25px;
	height:22px;
	text-align:center;
	padding-top:3px;
}
#item_cell_item_discount {
    background-color: #CA171D;
	position: absolute;
    padding-top: 10px;
    left: 253px;
    top: 40px;
    width: 68px;
    height: 57px;
    text-align: center;
    font-size: 19px;
    font-weight: 800;
    color: #fff;
}

</style>
<div class="container">
<div id="select">
  홈 > 
  <select id="select_option">
    <option>신상품</option>
    <option>전체보기</option>
    <option>음식장보기</option>
  </select>
</div>
  <div class="menu_banner"><img src="#" id="menu_banner"></div>
<div id="main_main">
<span id="full">상품 0개</span>
<div id="line">
  <ul id="line_list">
    <li><a href="/goods/meat?sort=low_high">낮은가격순</a></li>
    <li><a href="/goods/meat?sort=high_low">높은가격순</a></li>
    <li><a href="/goods/meat">등록일순</li>
  </ul>
</div>
@foreach($goods as $stuff)
	<div id="list_box">
	<a href="/goods/product/{{$stuff->id}}"><img src="{{$stuff->path}}" id="img_size"></a>
		<div id="menu_name">
		{{$stuff->name}}
		</div>
		{{$stuff->content}}
		<div id="color">
		{{$stuff->price}}
		</div>
	</div>
@endforeach
<div style="clear:both;padding-top:20px;">
<?php Auth::user()?$UserEmail=(Auth::user()->email):$UserEmail=NULL?>
<?php if($UserEmail==="maie421@naver.com"){ ?>
<a href="/goods/Add"><button type="button" class="btn btn-sm btn-primary" id="btnList" style="float:right;">추가</button></a>
<?php } ?>
</div>
</div>
</div>
	<div class="text-center" style="margin:0 auto;clear:both;padding-top:30px;width:100px;">
		<!-- {{ $goods->links() }} -->
		{{ $goods->appends(request()->input())->links() }}
	</div>
@endsection