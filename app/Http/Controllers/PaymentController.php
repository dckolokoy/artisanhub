<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\transaction_items;
use Redirect,Response;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    /**
     * Call a view.
     */
    public function index()
    {
        return view('payment');
    }

    /**
     * Initiate a payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function charge(Request $request)
    {
        $member_date = ['payment_type'=>$request->input('payment_type')];
        $request->session()->put('member_data', $member_date);


        if($request->input('submit'))
        {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ))->send();

                
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }


    }

    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {

        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
          
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $payment = new Payment;

                $value = Session::get('member_data');
         
                if($value['payment_type'] == null) {
                    $transaction = new Transaction;
                    $transaction->user_id = auth()->user()->id;
                  $transaction->total_amount = $arr_body['transactions'][0]['amount']['total'];
             $transaction->status = 1;
                  $transaction->save();
             $lastId = $transaction->id;
            
                     DB::table('transaction_items')
                         ->where('user_id', auth()->user()->id)
                         ->where('transaction_id', NULL)
                         ->update(['transaction_id' => $lastId ]);
 
 
                      $payment->transaction_id = $lastId;
                }
             

                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];

                $payment->user_id = auth()->user()->id;
                $payment->payment_type = $value['payment_type'];
                $payment->save();
                


                if($value['payment_type'] != null) {
                    return redirect('member/membership/')->with('success','Successfully subscribed to a membership plan!');
                }
                
              
                return redirect('/customer/my-cart/')->with('success','Payment Success, Please check your transaction for the status of order');


                unset($_SESSION["member_data"]);

            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        if(auth()->user()->role == 2)
        {
            return redirect('membership/')->with('error','User cancelled the payment');
            
        }
        else{
        return redirect('/customer/my-cart/')->with('error','User cancelled the payment');
        }
    
    }
}
