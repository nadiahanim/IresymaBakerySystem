<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

use App\Models\Order;
use App\Models\User;

class ToyyibPayController extends Controller
{
    public function createBill(Request $request)
    {
        $user_id = $request->user_id;
        $order_id = $request->order_id;
        $deposit_price = $request->deposit_price;

        $user_data = User::where([['id',$user_id]])->first();

        $bill_amount = $deposit_price*100;

        $bill_ref = 'Bill-Order-'.$order_id;

        $option = array(
            'userSecretKey'=> config('toyyibpay.key'),
            'categoryCode'=>config('toyyibpay.category'),
            'billName'=>'Iresyma Bakery Custom Cake',
            'billDescription'=>'Custom Cake Order',
            'billPriceSetting'=>1, //fixed or dynamic, if dynamic user key in total
            'billPayorInfo'=>1,
            'billAmount'=> $bill_amount, //100=RM1
            'billReturnUrl'=> route('checkout.paymentStatus'),
            'billCallbackUrl'=> route('checkout.callback'),
            'billExternalReferenceNo' => $bill_ref, //bill reference number
            'billTo'=> $user_data->fullname, //customer name
            'billEmail'=> $user_data->email, //customer email
            'billPhone'=> $user_data->phone, //customer phone no
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>'0', //0 untuk fpx, 1 for credit card, 2 for both
            'billContentEmail'=>'Thank you for your order!',
            'billChargeToCustomer'=>2, // untuk charge customer
          );

          $url = 'https://dev.toyyibpay.com/index.php/api/createBill';

          $response = Http::asForm()->post($url, $option);

          $billCode = $response[0]['BillCode'];

          return redirect('https://dev.toyyibpay.com/'.$billCode);

    }

    public function paymentStatus(Request $request)
    {
        $response = request()->all(['status_id', 'billcode', 'order_id']);

        $payment_status = $response['status_id'];

        $billcode = $response['billcode'];

        $order_id = substr($response['order_id'], 11);
        // dd($response['order_id']);

        $order = Order::where([['id',$order_id]])->first();

        if($payment_status == 1)
        {
            $order->payment_status  = $payment_status;
            $order->bill_code       = $billcode;
            $order->ordered_on      = date('Y-m-d H:i:s');
            $order->updated_on      = date('Y-m-d H:i:s');

            $saved = $order->save();

            if($saved)
            {
                return redirect()->route('order.view', ['order_id'=>$order_id])->with([
                    'success' => 'Your order is successfully submitted. Thank you for your order!',
                ]);
            }
            else 
            {
                return redirect()->route('cake.create')->with([
                    'error' => 'Sorry :( Your order cannot be submitted',
                ]);
            }
        }
        else 
        {
            return redirect()->route('cake.create')->with([
                'error' => 'Sorry :( Your order cannot be submitted',
            ]);
        }
    }

    public function callback(Request $request)
    {
        $response = request()->all(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount', 'transaction_time']);

    }


}
