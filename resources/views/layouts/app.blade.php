<!doctype html>
<html>
<head>
  <title>@yield('title')</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<!-- csrf token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>

* {
    padding: 0px;
    margin: 0px;
    font-family: "나눔고딕";
}
.container {
    width: 1120px;
    max-width: none !important;
}

ul {
    list-style-type: none;
}

#login_menu {
    width: 100%;
    background-color: #f8f8f8;
}

#login_menu #login_menu_1 ul li {
    display: inline;
}

#login_menu #login_menu_1 ul {
    background-color: #f8f8f8;
    width: 1058px;
    margin: 0 auto;
    text-align: right;
    color: #5D5D5D;
    font-size: 12px;
}

#login_menu #login_menu_1 {
    padding: 10px 0;
    border-bottom: 1px solid #e3e3e3;
    background-color: #f8f8f8;
}

#login_menu #login_menu_1 ul li a {
    padding: 0 15px;
    color: #5D5D5D;
    font-size: 12px;
    text-decoration: none;
}

#login_menu #login_menu_1 ul li a:hover {
    text-decoration: underline;
    color: black;
}

#top_logo_back {
    width: 1058px;
    text-align:center;
    margin: 20px auto;
}

#top_logo_img {
    width: 100px;
}

#center_menu {
    background-color: #3e92e0;
    text-align: center;
}

#center_menu #center_menu_1 {
    background-color: #3e92e0;
    padding: 5px 0;
    color: white;
    font-size: 16px;
    text-decoration: none;
    width: 1120px;
    margin: 0 auto;
}

#center_menu #center_menu_1 ul li {
    display: inline;
    margin: 0 25px;
}

#center_menu #center_menu_1 ul li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
}

#center_menu #center_menu_1 ul li a:hover {
    text-decoration: underline;
}
#main_main{
	width:1058px;
	margin:0 auto;
}
#footer {
	width:100%;
	height:100px;
	clear:both;
	float:left;
	margin-top:30px;
	border-top:solid 3px #3e92e0;
	display:block;
}
#footer_section {
    padding-bottom: 260px;
}
#footer_width, #footer_section {
    width: 1080px;
    margin: 0px auto;
}
#copy_left {
    width: 270px;
    float: left;
    border-right: 1px solid #dedede;
    margin: 45px 30px 0px 0px;
}
.copy_left_info{
	margin-top:10px;
	font-size: 12px;
    color: #777;
}
.copy_left_info, #copy_right {
    margin-top: 16px;
    font-size: 12px;
    line-height: 17px;
    color: rgb(149, 149, 149);
}
.copy_right_info {
    margin-top: 10px;
}
#copy_right {
    padding-top: 20px;
    width: 700px;
    float: left;
}
#footer_width ul li{
	display:inline;
	line-height: 51px;
	padding:0 5px;
    font-size: 13px;
    color: #555;
}

    </style>
<body>
  <!-- navigation bar -->
    <!--공통 부분-->
    <div id="login_menu">
            <div id="login_menu_1">
                <ul>
                @guest
                    <li><a href="/auth/login">로그인</a></li>
                    <li>|</li>
                    <li><a href="/auth/register">회원가입</a></li>
                    <li>|</li>
                    <li><a href="/notices/index">고객센터</a></li>
                @else
                    <li><a href="/mypage/order">{{ Auth::user()->name }}님</a></li>
                    <li><a href="/notices/index">고객센터</a></li>
                    <li><a 
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        로그아웃
                    </a></li>
                    <form id="logout-form" action="/authLogout" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                    <li><a href="/goods/cart">장바구니</a></li>
                </ul>
            </div>
            <div id="top_logo_back">
                <a href="/"><img
                        src="http://cafefiles.naver.net/data38/2009/6/19/229/%BA%CE%BB%EA%B4%D9%C0%CC%B3%AA%B9%CD_copy_rekios1209.png"
                        id="top_logo_img"></a>
            </div>
            <div id="center_menu">
                <div id="center_menu_1">
                    <ul>
                        <li><a href="/goods/meat">고기</a></li>
                        <li>|</li>
                        <li><a href="#">????</a></li>
                        <li>|</li>
                        <li><a href="#">????</a></li>
                        <li>|</li>
                        <li><a href="#">????</a></li>
                    </ul>
                </div>
            </div>
        </div>

        
    </header>
  </div>
  <!-- navigation bar ends here -->

  @yield('content')
<!--footer-->
<div id="footer">
    <div id="footer_width">
      <ul id="footer_1">
        <li>회사소개</li>
        <li>|</li>
        <li>이용안내</li>
        <li>|</li>
        <li>개인정보 처리방침</li>
        <li>|</li>
        <li>이용약관</li>
        <li>|</li>
        <li>입점문의</li>
        <li>|</li>
        <li>단체문의</li>
        <li>|</li>
        <li>카톡상담문의</li>
      </ul>
    </div>
    <hr>
<div id="footer_section">
      <div id="copy_left">
        <!-- 하단 고객센터 정보 수정하는곳 -->
        <h3>고객센터</h3>
        <h2>1111-1111</h2>
        <div class="copy_left_info">
        점심시간 12:00~13:00<br>
        평일 10:00~17:00<br>
        토요일 09:00~12:00<br>
        일요일/공휴일 휴무<br><br>
        Email : maie421@naver.com
			  </div>
      </div>
      <div id="copy_right">
				<img src="/img/main/top_logo.png" width="90px">
          <div class="copy_right_info">
          COMPANY : (주)푸드장  /  OWNER : 윤영미  /  CALL CENTER : 1111-1111  /  FAX : 111-111-1111<br>
          ADDRESS : 부산광역시 부산진구 엄광로 176 동의대<br>
          개인정보관리책임자 : 윤영미<br>
          maie421@naver.com<br>
          사업자등록번호 : [111-11-11111] /  통신판매업 신고번호  : 제1111-1111호[사업자정보확인]
          </div><br>
			    Copyright (c) by study421.com. All Right Reserved.
		  </div>
    </div>
</div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>
</html>