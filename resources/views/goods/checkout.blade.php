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
	text-align:center;
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
/* 주문정보 */
#ord_title{
	font-size:21px;
	color: #111;
    font-weight: bold;
    float: left;
}
#ord_box_mini{
	float: left;

}
#OrdBox {
    width: 500px;
    height: 100%;
    padding:5px;
    margin: 30px 20px;
    float: left;
    border: 1px solid #c9c9c9;
}
</style>
<div class="container">
<div id="join_top">
		<div id="join_title">
			장바구니
		</div>
		<span id="join_left">01장바구니 > <span id="red_color1">02주문서작성/결제 ></span> 03주문완료</span>
	</div>
    <table>
    <tr>
      <th class="notice_title">상품/옵션 정보</th> 
      <th class="notice">수량</th>
      <th class="notice">상품금액</th>
      <th class="notice">합계금액</th>
      <th class="notice">배송일정</th>
    </tr>
    @if(session('cart'))
    @foreach(session('cart') as $id => $details)
    <?php $total = 0 ?>
    <tr>
        <td class="notice_title" ><a href="#"><img src="{{ $details['path'] }} " id="basket_img"></a>
        <div id="basket_img_name">{{ $details['name'] }}</div></td>
        <?php $total += $details['price'] * $details['quantity'] ?>
        <td class="notice">{{ $details['quantity'] }}</td>
        <td class="notice">{{ $details['price'] }}</td>
        <td class="notice">{{$total}}</td>
        <td class="notice">배송일정</td>
    </tr>
	@endforeach
	@endif
    </table>
    <!-- 완료 -->
    <div id="OrdBox">
    <div class="form-group">
        <label for="email">Email Address</label>
        @if (auth()->user())
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
        @else
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        @endif
    </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="half-form">
            <div class="form-group">
                <label for="city">주소</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
            </div>
            <div class="form-group">
                <label for="province">상세주소</label>
                <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
            </div>
        </div> <!-- end half-form -->
        <div class="half-form">
            <!-- <div class="form-group">
                <label for="postalcode">Postal Code</label>
                <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
            </div> -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>
        </div> <!-- end half-form -->
    </div>
    <div id="OrdBox">
    <div class="form-group">
        <label for="name_on_card">Name on Card</label>
        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
    </div>
            <!-- 카드 입력창 -->
            <!-- <form role="form" action="#" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form"> -->
                        @csrf
  
                        <div class='form-row row'>

                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>

                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>

                        <!-- <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div> -->
                        <form action="/goods/payment" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- <input type='hidden' name="Authorization" value="KakaoAK sk_test_7qrss0xiTynn9s9Q9kbZqVit00GKIUHEN9"> -->
                        <input type="submit" value="확인">

                        <a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a>
                        </form>
                        <!-- <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                            </div>
                        </div> -->
                          
                    </form>
        <div id="card-element">
            <!-- a Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
    </div>
    <div class="spacer"></div>
    </div>
</div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
@endsection
