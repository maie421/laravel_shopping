@extends ('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')

<style>
#main_box{
	width:600px;
	margin:0 auto;
	padding-top:60px;
}
#main_box #title{
	font-size:28px;
	font-weight:bold;
	margin-bottom:20px;
}
#login_box,#login_find_box{
	width:600px;
	padding:50px 40px;
	border:1px solid #dcdcdc;
	margin-bottom:100px;
}
#login_box{
	height:565px;/*회색선 길이*/
}
#login_find_box{
	height:215px;/*회색선 길이*/
}
#tilte_side{			
	font-size:21px;
	font-weight:20px;
	margin-bottom:13px;
}
#login_input{
	width:330px;
	float:left;
}
#input_id{
	width:300px;
	float:left;
	border:1px solid #cccccc;
	padding:10px 5px;
	margin:5px 0;
}
#login_button,#Non-members{
	float:left;
	width:178px;
	height:98px;
	font-size:17px;
	margin-top:4px;
}
#login_button,#no_id{
	background-color:#2c2c2c;
	border:1px solid #2c2c2c;
	color:white;
}
#login_button:hover{
	background-color:#6b6b6b;
	border:1px solid #6b6b6b;
	cursor:pointer;
}
#Non-members{
	color:#666666;
	border:1px solid #a3a3a3;
	background-color:white;
}
#Non-members:hover{
	color:#2c2c2c;
	border:1px solid #2c2c2c;
	cursor:pointer;
}
#login_checkbox_box{
	float:left;
	width:600px;
	margin:6px 0 20px 0px;
}
#login_checkbox{
	float:left;
	width:18px;
	height:18px;
}
#id_color{
	font-size:13px;
	color:#717171;
}
#naver_logo_img {
    width: 85px;
    height: 30px;
    margin-right: 5px;
    float: left;
}
#button_naver {
    width: 510px;
    background-color: #fafafa;
    padding: 12px 0;
    border: 1px solid #c4c4c4;
}
.button_center {
    width: 200px;
    margin: 0 auto;
}
#button_naver:hover{
	cursor:pointer;
}
#naver_logo_name {
    font-size: 16px;
    float: left;
    margin-top: 8px;
}
#hr{
	border:solid 1px #dbdbdb;
	margin:13px 0;
}
#button_join,#button_join_find{
	width:153px;
	padding:12px 0;
	font-weight:bold;
	margin-bottom:85px;
}
#button_join{
	color:white;
	background-color:#6b6b6b;
	border:1px solid #6b6b6b;
}
#button_join:hover{
	background-color:#2c2c2c;
	border:1px solid #2c2c2c;
	cursor:pointer;
}
#button_join_find{
	margin-left:13px;
	background-color:white;
	color:#666666;
	border:1px solid #a3a3a3;
}
#button_join_find:hover{
	color:#6b6b6b;
	border:1px solid #6b6b6b;
	cursor:pointer;
}
/*아이디 찾기 비밀번호 찾기*/
#find_button{
	clear:both;
	border-top:1px solid #dbdbdb;
	padding:15px 0 0 74px;
	margin-top:120px;
}
#no_id {
    margin-top: 10px;
    width: 600px;
    height: 62px;
    font-size: 17px;
}
</style>
<div class="container">
<div id="main_box">
	  <div id="title">로그인</div>
  <div id="login_box">
    <div id="tilte_side">회원 로그인</div>
    <form method="post" action="insert.php">
    <div id="login_input">
      <input type="text" id="input_id" name="id" placeholder="아이디">
      <input type="password" id="input_id" name="pass" placeholder="비밀번호">
    </div>
    <input type="submit" id="login_button" value="로그인">
    </form>
    <div id="login_checkbox_box">
      <input type="checkbox" id="login_checkbox"><span id="id_color">&nbsp;아이디 저장</span>
    </div>
    
     <button id="button_naver">
     <div class="button_center">
     <img src="#" id="naver_logo_img">
     <div id="naver_logo_name">아이디 로그인</div>
     </div>
     </button>
     </a>
     <div id="hr"></div>
     <a href="../join/join.php"><button id="button_join"><span id="naver_logo_name_find">회원가입</span></button></a>
     <a href="id_find.php"><button id="button_join_find"><span id="naver_logo_name_find">아이디 찾기</span></button></a>
     <a href="pass_find.php"><button id="button_join_find"><span id="naver_logo_name_find">비밀번호 찾기</span></button></a>
     <!--비회원 로그인-->
    <!-- <div id="tilte_side">비회원 로그인</div>
      <div id="login_input">
      <input type="text" id="input_id" placeholder="주문자명">
      <input type="text" id="input_id" placeholder="주문번호">
    </div>
    <input type="submit" id="Non-members" value="확인"> -->
    <div id="login_checkbox_box">
      <span id="id_color">※주문번호와 비밀번호를 잊으신 경우, 고객센터로 문의하여 주시기 바랍니다.</span>
    </div>
  </div><!--login_box-->
  </div><!--main_box-->
</div>
@endsection