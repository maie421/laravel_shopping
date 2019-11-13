@extends('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')
<style>
    #join_top {
	width:1058px;
	margin:0 auto;
	padding:35px 0 40px 0;
	border-bottom:1px solid #bdbcbc;
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
#red_color {
	color:#ff4c2e;
}
#red_color1 {
	color:#D34E3B;
}
#basic,#join_box {
	width:790px;
	margin:0 auto;
}
#basic {
	padding:40px 0 35px 0;
	border-bottom:1px solid #717171;
}
#join_box_mini,#join_box_mini_e,#join_box_mini_a{
	background-color:#f9f9f9;
	width:170px;
	font-weight:bold;
	font-size:15px;
	float:left;
}
#join_box_mini{
	padding:22px 0 22px 25px;
}
#join_box_mini_e{
	padding:22px 0 49px 25px;
}
#join_box_mini_a{
	padding:22px 0 115px 25px;
}
#join_input,#email_input,#email_select, #address,#address_button,#address_input{
	border: 1px solid #d0d0d0;
	height:24px;
	padding:15px 5px;
}
#join_input,#address_input {
	width:400px;
}
#address_input{
	margin-top:10px;
}
#email_input{
	width:275px;
}
#email_select,#address_button{
	width:120px;
	height:37px;
	color:#4f4f4f;
}
#join_box_mini_1 {
	float:left;
	padding:13px;
	width:569px;
}
#join_box hr {
	clear:both;
	border: 1px solid #dbdbdb;
}
#agree_box{
	float:left;
	margin-top:10px;
}
#agree{
	float:left;
	color:#4f4f4f;
	font-size:15px;
	margin-left:5px;
}
#agree_checkbox{
	float:left;
	width:17px;
	height:17px;
}
#address{
	width:170px;
	margin-right:10px;
}
#address_button{
	background-color:#fafafa;
}
#address_button:hover{
	background-color:#f8f8f8;
	cursor: pointer;
}
.button_box{
	text-align:center;
}
.button,.button_Check{
	width:150px;
	height:40px;
	margin:30px 0;
	border:solid 1px #555555;
}
.button{
	margin-right:10px;
	background-color:white;
}
.button:hover{
	cursor: pointer;
}
.button_Check{
	background-color:#555555;
	color:white;
}
.button_Check:hover{
	background-color:#2c2c2c;
	border:solid 1px #2c2c2c;
	cursor: pointer;
}
    </style>
<div id="join_top">
		<div id="join_title">
			회원가입
		</div>
		<span id="join_left">01약관동의 ><span id="red_color1"> 02정보입력 ></span> 03가입완료</span>
	</div>
	<div id="basic">
		<div id="join_title">
			기본정보
		</div>
		<span id="join_left"><span id="red_color">*</span> 표시는 반드시 입력하셔야 하는 항목입니다.</span>
	</div>
  <form name="member" action="insert.php" method="post" onsubmit="return check();"> 
	<div id="join_box">
		<div id="join_box_mini">
			<span id="red_color">*</span> 아이디
		</div>
		<div id="join_box_mini_1">
			<input type="text" id="join_input" name="id">
		</div>
		<hr>
	</div>
  <div id="join_box">
		<div id="join_box_mini">
			<span id="red_color">*</span> 비밀번호
		</div>
		<div id="join_box_mini_1">
			<input type="password" id="join_input" name="pass" placeholder="영문대/소문자,숫자,특수문자 중 2가지 이상 조합하세요">
		</div>
		<hr>
	</div>
  <div id="join_box">
		<div id="join_box_mini">
			<span id="red_color">*</span> 비밀번호확인
		</div>
		<div id="join_box_mini_1">
			<input type="password" id="join_input" name="pass1">
		</div>
		<hr>
	</div>
  <div id="join_box">
		<div id="join_box_mini">
			<span id="red_color">*</span> 이름
		</div>
		<div id="join_box_mini_1">
			<input type="text" id="join_input" name="name">
		</div>
		<hr>
	</div>
  <div id="join_box">
		<div id="join_box_mini_e">
			<span id="red_color">*</span> 이메일
		</div>
		<div id="join_box_mini_1">
			<input type="text" id="email_input" name="email">
		</div>
		<hr>
	</div>
  <div id="join_box">
		<div id="join_box_mini_e">
			<span id="red_color">*</span> 휴대폰번호
		</div>
		<div id="join_box_mini_1">
			<input type="text" id="join_input" placeholder="-없이 입력하세요" name="phone">
		</div>
		<hr>
	</div>
  <div id="join_box">
		<div id="join_box_mini">
			<span id="red_color">&nbsp;</span> 전화번호
		</div>
		<div id="join_box_mini_1">
			<input type="text" id="join_input" placeholder="-없이 입력하세요" name="home">
		</div>
		<hr>
	</div>
  <div id="join_box">
		<div id="join_box_mini_a">
			<span id="red_color">&nbsp;</span> 주소
		</div>
		<div id="join_box_mini_1">
			<input type="text" id="address" placeholder="우편번호">
      <input type="text" id="address_input" id="sample4_roadAddress" placeholder="도로명주소" name="adress2">
      <input type="text" id="address_input" id="sample6_address2" name="address1" placeholder="상세주소">
		</div>
		<hr>
	</div>
  <div class="button_box">
   <input type="button" class="button" value="취소">
   <input type="submit" class="button_Check" value="회원가입">
  </div>
  </form>
@endsection