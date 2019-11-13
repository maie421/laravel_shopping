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
    </style>
<body>
  <!-- navigation bar -->
    <!--공통 부분-->
    <div id="login_menu">
            <div id="login_menu_1">
                <ul>
                    <li><a href="login">로그인</a></li>
                    <li>|</li>
                    <li><a href="join">회원가입</a></li>
                    <li>|</li>
                    <li><a href="#">고객센터</a></li>
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
                        <li><a href="meat">고기</a></li>
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


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>
</html>