@extends('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')
<style>
    .carousel-item {
        height: 50vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .event_img {
        width: 250px;
        height: 250px;
        /* margin: 30px 50px; */
    }

    .footer {
        /* position: fixed; */
        clear: both;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 1;
        background-color: red;
        color: white;
        text-align: center;
    }

    /* 이미지 */

    #menu_img{
	width:1198px;
	height:350px;
	margin:0 auto;
}
.bxslider{
	width:1198px;
	margin:0 auto;
}
.bxsliderColor{
	width:100%;
	background-color:#e3e2dd;
	height:350px;
}
#main_main #main_title_04{
	margin:45px 0 35px 0;
}
#main_main #box_sale,#main_main #box_sale_1{
	border:solid 1px #ececec;
	background-color:white;
	float:left;
	margin-bottom:40px;
	width:300px;
	height:430px;
	position:relative;
}
#main_main #box_sale_1{
	margin:0 61px;
}
#main_main #box_sale_img{
	width:300px;
	height:300px;
}
#box_sale_name{
	margin:10px 0;
	font-size:15px;
	font-weight:bold;
}
del{
	float:right;
	color:#999;
}
#color{
	float:right;
	color:red;
	font-size:18px;
	font-weight:bolder;
	font-family: arial;
}
#item_cell_item_discount,#item_cell_item_discount_b{
	position:absolute;
	padding-top:10px;
	left:237px;
	top:5px;
    width: 68px;
    height: 57px;
    text-align: center;
    font-size: 19px;
	font-weight: 800;
    color: #fff;
}
#item_cell_item_discount{
	background-color: #CA171D;
}
#item_cell_item_discount_b{
	background-color: #4974A1;
}
/*main_main_gray*/
#main_main_gray{
	background-color:#f5f5f5;
	height:635px;
	clear:both;
	padding:60px 0 20px 0;
}
#pedometerBox{
	background-color:Red;
	margin:0 auto;
}
#main_main_gray #main_main .pedometer{
	border:solid 1px #ececec;
	background-color:white;
	padding:12px 0;
	margin-bottom:30px;
	text-align:center;
	font-size:14px;
	width:209px;
	font-weight:bold;
	float:left;
	color:#4B4B4B;
}
#main_main_gray #main_main .pedometer:hover{
	color:white;
	background-color:#CA171D;
	cursor: pointer;
}
#main_main_gray #main_main #main_title_105{
	margin-bottom:20px;
}
#event_full{
	width:1058px;
	margin:0 auto;
}
#event{
	width:670px;
	margin-right:10px;
	float:left;
}
#event_1{
	width:378px;
	float:left;
}
#event,#event_1{
	margin-bottom:50px;
}
#event_title,#event_title_1{
	font-size:24px;
	color:#717171;
	font-weight:bold;
	float:left;
}
#event_title{
	margin:25px 0 10px 240px;
}
#event_title_1{
	margin:25px 0 10px 100px;
}
#event_title_more{
	font-size:14px;
	color:#717171;
	margin:36px 0 10px 0;
	float:right;
}
#event #event_title_more a{
	text-decoration:none;
}
#event #event_img{
	width:670px;
	height:212px;
}
#event_1 #event_img_1{
	width:378px;
	height:429px;
}
/*main_main_gray_img*/
#main_main_gray_img{
	height:265px;
	background-color:#f5f5f5;
	clear:both;
	padding:20px 0 20px 0;
}
#main_main_gray_img #sale_img{
	float:left;
	width:575px;
	height:225px;
}
#main_main_gray_img #right_banner{
	float:left;
	margin-left:15px;
	width:225px;;
	height:225px;
}

</style>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: -15px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active"
            style="background-image: url('https://shoppi.s3.ap-northeast-2.amazonaws.com/linkedin_banner_image_2.png')">
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item"
            style="background-image: url('https://www.foodjang.com/data/skin/front/0685everest/img/banner/slider_2258553093/eb4c9d469cf4da590a895ed7a93f1c23_93818.jpg')">
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item"
            style="background-image: url('https://www.foodjang.com/data/skin/front/0685everest/img/banner/slider_2258553093/16b48ee5a816e8eb05ea677d2de84450_95832.jpg')">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
        <div id="main_main">
        <img src="http://study421.dothome.co.kr/img/main/main_title_04.jpg" id="main_title_04">

		<div id='box_sale'>
        <a href="#"><img src="http://study421.dothome.co.kr/html/management/1000000959_detail_054.jpg" id="box_sale_img"></a>
        <div id="box_sale_name"><!--홀수 짝수 박스 크기 다름-->
        500</br>
        </div>
        <del>5000원</del></br>
        <div id="color">
        5000원
        </div>
		</div>
        <div id="box_sale_1"><!--페이지 이동-->
        <img src="http://study421.dothome.co.kr/html/management/1000000906_detail_047.jpg" id="box_sale_img">
        <div id="box_sale_name">
        [eat cook] 냉장 스테이크 +</br>
        </div>
        <br>
        <div id="color">
        13900원
        </div>
        </div><!--box_sale-->
        <div id=box_sale>
        <img src="http://study421.dothome.co.kr/html/management/1000000776_detail_073.jpg" id="box_sale_img">
        <div id="box_sale_name"><!--홀수 짝수 박스 크기 다름-->
        대패삼겹살 500g x 4팩</br>
        </div>
        <del>24400원</del></br>
        <div id="color">
        21960원
        </div>
		</div>
    </div>
    <div id="main_main_gray">
      <div id="main_main">
        <img src="http://study421.dothome.co.kr/img/main/main_title_105.jpg" id="main_title_105">
        <!-- box_sale_1 -->
        <div id="box_sale"><!--페이지 이동-->
        <a href="#"><img src="http://study421.dothome.co.kr/html/management/1000000959_detail_054.jpg" id="box_sale_img"></a>
        <div id="box_sale_name">
        가지</br>
        </div>
        <br>
        <div id="color">
        5000원
        </div>
        </div><!--box_sale-->
        <div id="box_sale_1">
        <img src="http://study421.dothome.co.kr/html/management/1000001212_detail_045.jpg" id="box_sale_img">
        <div id="box_sale_name"><!--홀수 짝수 박스 크기 다름-->
        듀록 삼겹살 500g<br>
        </div>
        <del>6500원</del><br>
        <div id="color">
        5900원
        </div>
        </div>
        <div id="box_sale"><!--페이지 이동-->
        <img src="http://study421.dothome.co.kr/html/management/1000001308_detail_0100.jpg" id="box_sale_img">
        <div id="box_sale_name">
        소고기 장조림용 300g</br>
        </div>
        <br>
        <div id="color">
        5890원
        </div>
        </div><!--box_sale-->
	</div>
     </div><!--main_main-->
    </div><!--main_main_gray-->
    <div id="event_full">
      <div id="event">
          <div id="event_title">이벤트 전시관</div>
          <a href="#"><span id="event_title_more">전체보기></span></a>
          <img src="https://www.foodjang.com/data/skin/front/0685everest/img/banner/slider_1270106821/72ba537fea64fbab95b2ae67b65a354d_50487.png" id="event_img">
          <!-- 자바-->
          <img src="http://study421.dothome.co.kr/img/main/event01.jpg" id="event_img">
      </div>
      <div id="event_1">
          <!-- 자바-->
          <div id="event_title_1">스테이크 전시관</div>
          <a href="#"><span id="event_title_more">전체보기></span></a>
          <img src="https://www.foodjang.com/data/skin/front/0685everest/img/banner/slider_587930787/f3ccdd27d2000e3f9255a7e3e2c48800_15889.jpg" id="event_img_1">
      </div>
    </div>
    <div id="main_main_gray_img">
      <div id="main_main">
        <img src="http://study421.dothome.co.kr/img/main/sale.jpg" id="sale_img">
        <img src="http://study421.dothome.co.kr/img/main/right_banner01.jpg">
        <img src="http://study421.dothome.co.kr/img/main/right_banner02.jpg" id="right_banner">
      </div>
    </div>
    </section>
@endsection