<?php

namespace App\Http\Controllers;
use Pesapal;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use AmrShawky\LaravelCurrency\Facade\Currency;

class PaymentsController extends Controller
{
    public function payment(Request $request){//initiates payment
        if($request->currency == "KES"){
            $amount = $request -> amount;
        }elseif($request->currency == "USD"){
            $amount = Currency::convert()->from('USD')->to('KES')->amount($request -> amount)->get();
        }elseif($request->currency == "GBP"){
            $amount = Currency::convert()->from('GBP')->to('KES')->amount($request -> amount)->get();
        }elseif($request->currency == "EUR"){
            $amount = Currency::convert()->from('EUR')->to('KES')->amount($request -> amount)->get();
        }



        $payments = new Payment;
        $payments -> businessid = 1; //Business ID
        $payments -> transactionid = Pesapal::random_reference();
        $payments -> status = 'NEW'; //if user gets to iframe then exits, i prefer to have that as a new/lost transaction, not pending
        $payments -> amount = (int)$amount;
        $payments -> currency = $request->currency;
        $payments -> save();

        $details = array(
            'amount' => $payments -> amount,
            'description' => 'Royal-Tech-Computers'.$request->first_name,
            'type' => 'MERCHANT',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phonenumber' => $request->mobile,
            'reference' => $payments -> transactionid,
            'height'=>'800px',
            'currency' => 'KES'
        );
        // dd($details);
        $iframe=Pesapal::makePayment($details);

        return view('payments.business.pesapal', compact('iframe'));
    }
    public function paymentsuccess(Request $request)//just tells u payment has gone thru..but not confirmed
    {
        // Clear Cart
        \Cart::clear();
        $trackingid = $request->input('tracking_id');
        $ref = $request->input('merchant_reference');

        $payments = Payment::where('transactionid',$ref)->first();
        $payments -> trackingid = $trackingid;
        $payments -> status = 'Confirmed';
        $payments -> save();
        //go back home
        $payments=Payment::all();
        return view('payments.business.home', compact('payments'));
    }
    //This method just tells u that there is a change in pesapal for your transaction..
    //u need to now query status..retrieve the change...CANCELLED? CONFIRMED?
    public function paymentconfirmation(Request $request)
    {
        $trackingid = $request->input('pesapal_transaction_tracking_id');
        $merchant_reference = $request->input('pesapal_merchant_reference');
        $pesapal_notification_type= $request->input('pesapal_notification_type');

        //use the above to retrieve payment status now..
        $this->checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type);
    }
    //Confirm status of transaction and update the DB
    public function checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type){
        $status=Pesapal::getMerchantStatus($merchant_reference);
        $payments = Payment::where('trackingid',$trackingid)->first();
        $payments -> status = $status;
        $payments -> payment_method = "PESAPAL";//use the actual method though...
        $payments -> save();
        return "success";
    }


    public function make_payment(){
        $page_title = 'We will be Back Soon';
        return view('payments.business.make-payment',compact('page_title'));
    }
}
