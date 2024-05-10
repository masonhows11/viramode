<?php

namespace App\Http\Controllers\Front\Payment;

use App\Models\Order;

// use App\Models\Payment;
use App\Models\CartItems;
use Illuminate\Http\Request;
use App\Services\Basket\Basket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Services\PaymentService\PaymentService;
use App\Http\Requests\PaymentRequest\GateWayTypeRequest;

class PaymentController extends Controller
{
    //


    private Basket $basket;


    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }


    public function checkOut()
    {

        $user = Auth::id();
        $cartItems = CartItems::where('user_id', $user)->get();
        $order =  Order::with('delivery', 'address')
            ->where('user_id', '=', $user)
            ->where('order_status', '=', 0)->first();


        $cartItemsCount = null;
        $totalProductPrice = null;
        $totalDiscount = null;
        foreach ($cartItems as $item) {
            $totalProductPrice += $item->cartItemProductPrice();
            $totalDiscount += $item->cartItemProductDiscount();
            $cartItemsCount += $item->number;
        }

        return view(
            'front_end.payment.payment',
            [
                'cartItems' => $cartItems,
                'order' => $order,
                'totalProductPrice' => $totalProductPrice + $order->delivery->amount,
                'totalDiscount' => $totalDiscount,
                'cartItemsCount' => $cartItemsCount,
                'cartItems' => $cartItems,
            ]
        );
    }


    public function payment(GateWayTypeRequest $request)
    {

        $gateWayList = ['Zarinpal', 'IDPay', 'Mellat'];
        if (!in_array($request->gateway, $gateWayList)) {
            session()->flash('error', __('messages.there_is_no_payment_gateway'));
            return  redirect()->back();
        }

        try {
            $order =  Order::findOrFail($request->order);
            $order->gateway = $request->gateway;
            $order->save();
            $gateWayName = $request->gateway . 'Gateway';
            $gatewayClassRequest = "App\\Services\\PaymentService\\Request\\{$request->gateway}Request";


            if (!class_exists($gatewayClassRequest)) {
                session()->flash('error', __('messages.this_part_is_being_prepared'));
                return  redirect()->back();
            }

            $gateWayRequest = new $gatewayClassRequest([
                'amount' => $order->order_final_amount,
                'orderId' => $order->order_number,
                'user' => Auth::user(),
                'apiKey' => Config::get('services.gateways.' . "$request->gateway" . '.api_key'),
            ]);

             $paymentService = new PaymentService($gateWayName, $gateWayRequest);
             return $paymentService->pay();

        } catch (\Exception $ex) {
            return $ex->getMessage();
            session()->flash('error', __('messages.there_is_an_error_in_payment_process'));
            return  redirect()->back();
        }
    }


    public function paymentVerify(Request $request)
    {

        $paymentInfo = $request->all();
        $order =  Order::where('order_number',$paymentInfo['order_id'])->select('gateway')->first();
        $gateWayName = $order->gateway . 'Gateway';
        $gatewayVerifyRequest = "App\\Services\\PaymentService\\Request\\{$order->gateway}VerifyRequest";

        $idPayVerifyRequest = new  $gatewayVerifyRequest([
            'apiKey' => Config::get('services.gateways.' . "$order->gateway" . '.api_key'),
            'id' => $paymentInfo['id'],
            'orderId' => $paymentInfo['order_id'],
            'gateway' => 'idPay',
        ]);

        $paymentService = new PaymentService($gateWayName, $idPayVerifyRequest);
        $result = $paymentService->verify();


        if ($result['status'] == false)
        {

            $this->paymentFailed($result);

        }
        if ($result['status'] == true)
        {

            $this->paymentSuccess($result);

        }
        return null;
    }


    public function paymentSuccess($result)
    {

        $order = Order::where('order_number',$result['order_id'])->first();
        $this->completeOrder($order);
        $this->completePayment($order,$result);
        $this->normalizeQuantity($order);
        return view('front_end.payment.payment_success');

    }

    public function paymentFailed($result)
    {

        $order = Order::where('order_number',$result['order_id'])->first();
        return view('front_end.payment.payment_failed');
    }

    private function completeOrder(Order $order)
    {
        $order->complete();
        $this->basket->clearBasket();
    }

    private function completePayment(Order $order,$result)
    {
        $order->payment->confirm($result);
    }


    private function normalizeQuantity(Order $order)
    {
        foreach($order->orderItems->product as $product)
        {
               $product->decrementStock($product->number);
        };
    }





}
