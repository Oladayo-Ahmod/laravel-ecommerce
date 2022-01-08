<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Models\Order; 

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $order = new Order;
        $order->first_name = $paymentDetails['data']['metadata']['first_name'];
        $order->last_name = $paymentDetails['data']['metadata']['last_name'];
        $order->status = $paymentDetails['message'];
        $order->address = $paymentDetails['data']['metadata']['address'];
        $order->user_id = $paymentDetails['data']['metadata']['user_id'];
        $order->payment_status = $paymentDetails['data']['status'];
        $order->payment_method = $paymentDetails['data']['channel'];
        $order->save();
        return back()->with('payment_success','You have successfully made payment for the product(s)');
        // dd($paymentDetails['data']['metadata']['first_name']);
        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}