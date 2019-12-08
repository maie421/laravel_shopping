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
.title_detail {
    width: 1000px;
    height: 40px;
    clear: both;
    margin-bottom: 25px;
    padding-top: 40px;
}
.title_detail li {
    float: left;
    width: 235px;
    height: 40px;
    border: 1px solid #dedede;
    border-left: 0px;
    text-align: center;
    background-color: #fafafa;
}
.title_detail li a {
    line-height: 40px;
    font-size: 15px;
    color: #777;
    text-align: center;
    letter-spacing: -0.5px;
}
.title_detail .on {
    background-color: #fff;
    border: 1px solid #222 !important;
    color: #222;
    height: 40px;
}
.btn {
    float: right;
    font-size: 0;
	margin:30px 0;
}
.btn .skinbtn {
    border: 1px solid #d9d9d9;
    padding: 10px 12px 8px 12px;
    font-size: 11px;
	color: #777;
    text-align: center;
}
.qna {
    padding: 20px 13px 0 96px;
    background: #f8f8f8;
    border-bottom: 1px solid #dbdbdb;
	clear:both;

}
.review-board {
    width: 100%;
    margin: 18px 0 0;
    border-top: 2px solid #dbdbdb;
    table-layout: fixed;
}
td .wrap {
    padding: 20px 20px 0 166px;
    background: #f8f8f8;
    border-bottom: 1px solid #dbdbdb;
}
td .view {
    color: #444;
    line-height: 1.8;
}
td .comment-wrap .head {
    overflow: hidden;
    padding: 24px 0 0;
}
td .comment-wrap ul li {
    border-top: 1px solid #dbdbdb;
}
td .comment-wrap .comment-write {
    overflow: hidden;
    padding: 18px 0;
    border-top: 1px solid #dbdbdb;
}

td .qna .msg {
    max-width: 700px;
    line-height: 1.6;
}
td .qna .answer {
    padding-top: 11px;
    padding-bottom: 11px;
    background: url(../img/icon/a.png) no-repeat left 17px;
    border-top: 1px solid #dbdbdb;
}
</style>
<div class="container" style="margin-top:-40px; width:1000px;" >
<img src="{{$product->path}}" id="img_size">
  <div id="maine_side" >
    <div id="menu_name">{{$product->name}}</div>
    {{$product->content}}
    <hr>
    <ul id="purchase">
      <li><b>소비자가</b> <del> &nbsp;{{$product->price}}</del></li>
      <li><b>판매가 &nbsp;	<span id="red">{{$product->price}}</span></b>원</li>
      <li><b>구매제한</b> &nbsp;최소 1개</li>
      <li><b>배송비</b> &nbsp;	조건부무료(50,000원 미만 구입시 3,000원)</li>
      <li><b>가능배송</b> &nbsp;우체국 택배 / 모닝 배송</li>
    </ul>
    <div id="result">
	{{$product->name}}
      <span id="number_box">
        <input type="text" id="number" value="1" name="quantity">
        <div id="number_button_box">
          <div id="number_button">∧</div>
          <div id="number_button">∨</div>
        </div>
      </span>
    </div>
    <div id="full_result"></div>
	<a href="/goods/Addcart/{{$product->id}}"><input type='button' id='shoppingbasket' value='장바구니에 담기' ></a>
  </div>
    <div class="title_detail">
		<ul>
		<li><a href="#none" onclick="movesub('page01')">상품상세정보</a></li>
		<li class="on"><a href="#none" onclick="movesub('page02')">상품사용후기</a></li>
		<li><a href="#none" onclick="movesub('page03')">상품 Q&amp;A</a></li>
		<li class=""><a href="#none" onclick="movesub('page04')">배송교환관련</a></li>
		</ul>
    </div>
	<div class="btn">
	<a href="#" class="skinbtn gv-qnawrite"><em>상품후기 글쓰기</em></a>
	</div>
	<tbody>
	<!-- 상품후기 리스트 -->
<table class="table" style="margin-top:-40px;">
	<tr>
		<td>1</td>
		<td style="width:470px"><a href="javascript:doDisplay(3);">배송상태 좋아요</a></td>
		<td>홍길*</td>
		<td>2019.10.07</td>
	</tr>
	<tr class="detail js-detail" >
        <td colspan="4" style="display: table-cell;">
		<div class="wrap" id="3"style="margin-bottom:25px; display:none" >
			<div class="view" >
				캠핑
			</div>
			<div class="comment-wrap" style="padding-bottom:20px">
				<div class="head">
					<div class="comment-count">
						<p><strong>0</strong> 개의 댓글이 있습니다</p>
					</div>
				</div>
				<ul>
					<li>
						<div class="comment-item not-record">등록된 댓글이 없습니다.</div>
					</li>

				</ul>
				<div class="comment-write js-form-write">
					<div class="ctt">
					<textarea class="form-control" rows="5" name="content" id="content" placeholder="댓글내용을 입력해주세요" ></textarea>
					</div>
					<div style="text-align:right"><a href="#"><em>확인</em></a></div>
					<div class="clear-both"></div>
				</div>
			</div>
		</div>
	</td>
    </tr>
</table>
<table class="table"  style="margin-top:-40px;">
	<tr>
		<td>1</td>
		<td style="width:470px"><a href="#">배송상태 좋아요</a></td>
		<td>홍길*</td>
		<td>2019.10.07</td>
	</tr>
</table>
<!-- 끝 상품후기 리스트 -->
<!-- 시작 상품문의 리스트 -->
<div class="title_detail">
	<ul>
	<li><a href="#none" onclick="movesub('page01')">상품상세정보</a></li>
	<li class="#none"><a href="#none" onclick="movesub('page02')">상품사용후기</a></li>
	<li class="on"><a href="#" onclick="movesub('page03')">상품 Q&amp;A</a></li>
	<li class=""><a href="#none" onclick="movesub('page04')">배송교환관련</a></li>
	</ul>
</div>
<div class="btn">
	<a href="#" class="skinbtn gv-qnawrite"><em>상품문의 글쓰기</em></a>
</div>
<table class="table" style="margin-top:-40px;">
	<tr>
		<td>1</td>
		<td style="width:470px" ><a href="javascript:doDisplay(2);">배송상태 좋아요</a></td>
		<td>홍길*</td>
		<td>2019.10.07</td>
		<td>답변미완료</td>
		<td>답변하기</td>
	</tr>
	<td colspan="5" style="display: table-cell; border-top:none;">
	
	<div class="qna" id="2" style="	display:none;">
		<div class="question">
			<div class="msg">
				<strong>유통기한</strong>
				<p>대략 유통기한이 어느정도 되나요?&nbsp;</p>
			</div>
			<div class="btn">
			</div>
		</div>
		<div class="answer">
			<div class="msg">
				<strong>안녕하세요 푸드장입니다.</strong>
				<p style="">저희 푸드장을 이용해주셔서 감사합니다.♥</p>
			</div>
			<div class="btn">
			</div>
		</div>
	</div>
	</td>
</table>
<!-- 상품문의 리스트 -->
<script type="text/javascript">
	var bDisplay = true;
	function doDisplay(i){
		var con = document.getElementById(i);
		if(con.style.display=='none'){
			con.style.display = 'block';
		}else{
			con.style.display = 'none';
		}
	}
</script>
</div>

@endsection