<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentHistory;

class checkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/goods/checkout');
    }

    public function payment(Request $request){
        env('KAKAOPAY_ADMIN_KEY');
        $data = ([
            'cid' => 'TC0ONETIME',
            'partner_order_id' => 'partner_order_id',
            'partner_user_id' => 'partner_user_id',
            'item_name' => '초코파이',
            'quantity' => '1',
            'total_amount' => '2200',
            'vat_amount' => '200',
            'tax_free_amount' => '0',
            'approval_url' => url('kakaopay/single/success'),
            'cancel_url' => url('kakaopay/single/cancel'),
            'fail_url' => url('kakaopay/single/fail')
        ]);

        return view('https://kapi.kakao.com/v1/payment/ready',['data'=>$data]);
        // json_decode($response->getBody());

        // return redirect('/goods/payment');
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
