<?php

namespace App\Http\Controllers\Front\Payment;

use App\Models\Order;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Delivery;
use App\Models\CartItems;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Services\Basket\Basket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\OrderNumber\OrderNumberServices;
use App\Http\Requests\PaymentRequest\AddressDeliveryRequest;

// use Illuminate\Http\Request;
class AddressController extends Controller
{
    //

    private Request $request;
    private Basket $basket;
    private $cartItems;
    

    public function __construct( Request $request, Basket $basket)
    {
       
        $this->request = $request;
        $this->basket = $basket;
       
    }


    public function checkAddress()
    {
        $user = Auth::user();
        $deliveries = Delivery::where('status', 1)->get();
        $addresses = Address::where('user_id', $user->id)->get();
        $cartItems = CartItems::where('user_id', $user->id)->get();
        

        $cartItemsCount = null;
        $totalProductPrice = null;
        $totalDiscount = null;
        foreach ($cartItems as $item) {
            $totalProductPrice += $item->cartItemProductPrice();
            $totalDiscount += $item->cartItemProductDiscount();
            $cartItemsCount += $item->number;
        }

        if (
            empty($user->mobile) || empty($user->first_name) ||
            empty($user->last_name) || empty($user->email) ||
            empty($user->national_code) || $user->addresses->isEmpty()
          )
          {
             session()->flash('error', __('messages.complete_your_user_information_before_proceeding_with_payment'));
             return redirect()->route('user.profile');
          }


        return view('front_end.address.address')
                ->with([
                    'totalProductPrice' => $totalProductPrice, 'totalDiscount' => $totalDiscount,
                    'cartItemsCount' => $cartItemsCount,
                    'cartItems' => $cartItems, 'addresses' => $addresses,
                    'deliveries' => $deliveries
                ]);
    }

   
     public function chooseAddressDelivery(AddressDeliveryRequest $request, OrderNumberServices $numberServices)
     {

        $user = Auth::id();
        $cartItems = CartItems::where('user_id', $user)->get();

         $total_product_price = null;
         $total_final_price = null;
         $total_final_discount_price_with_number = null;
         foreach ($cartItems as $item) {
             $total_product_price += $item->cartItemProductPriceWithOutNumber();
             $total_final_price += $item->cartItemFinalPrice();
             $total_final_discount_price_with_number += $item->cartItemFinalDiscount();
         }

         $orderNumber = $numberServices->generateNumber();
         $delivery = Delivery::findOrFail($request->delivery_id);
         $order_final_amount =  $total_final_price + $delivery->amount;

         $order = $this->makeOrder($orderNumber,$delivery->id,$request->address_id,$order_final_amount);
         $payment = $this->makePayment($order);
        
         return redirect()->route('payment.checkout')->with(['order'=> $order]);
     }


     private function makeOrder($orderNumber,$delivery_id,$address_id,$order_final_amount)
     {
        $order = Order::updateOrCreate(
            ['user_id' => Auth::id(), 'order_status' => 0],
            [
                'order_number' => $orderNumber,
                'address_id' => $address_id,
                'delivery_id' => $delivery_id,
                'order_final_amount' =>  $order_final_amount,
            ]);
        $this->makeOrderItems($order);
        return $order;
     }


     private function makeOrderItems($order)
     {
        $user = Auth::id();
        $cartItems = CartItems::where('user_id', $user)->get();
        foreach($cartItems as $item){
            OrderItem::updateOrCreate(
                ['order_id' => $order->id, 'user_id' => $user],
                [
                'user_id' => $user,
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'number' => $item->number,
                'final_product_price' => $item->cartItemProductPriceWithOutNumber(),
                'final_total_price' => $item->cartItemFinalPrice(),
            ]);
        }
       
     }
 

     private function makePayment($order)
     {
         return Payment::updateOrCreate(
             ['order_id' => $order->id, 'status' => 0],
             ['amount' => $order->order_final_amount,] );
     }




    // public function getCities(Request $request)

    // {
    //     try {
    //         $cities = City::where('province_id', $request->id)->get();
    //         if ($cities->isNotEmpty()) {
    //             return response()->json(['data' => $cities, 'status' => 200], 200);
    //         } else {
    //             return response()->json(['data' => 'not found any record', 'status' => 404], 200);
    //         }
    //     } catch (\Exception $ex) {
    //         return response()->json(['data' => __('messages.An_error_occurred'), 'status' => 500], 200);
    //     }
    // }

}
