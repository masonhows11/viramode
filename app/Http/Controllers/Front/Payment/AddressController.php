<?php

namespace App\Http\Controllers\Front\Payment;

use App\Models\Order;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Delivery;
use App\Models\CartItems;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\OrderNumber\OrderNumberServices;
use App\Http\Requests\PaymentRequest\AddressDeliveryRequest;

// use Illuminate\Http\Request;
class AddressController extends Controller
{
    //


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
        ) {
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

        try {

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

            $order = $this->makeOrder($orderNumber, $delivery->id, $request->address_id, $order_final_amount);
                     $this->makeOrderItems($order);
                     $this->makePayment($order,$cartItems);
            return redirect()->route('payment.checkout')->with(['order' => $order]);

        } catch (\Throwable $e) {
            session()->flash('error',__('messages.An_error_occurred'));
            return redirect()->back();
        }

    }


    private function makeOrder($orderNumber, $delivery_id, $address_id, $order_final_amount)
    {

        try {

            $order = Order::updateOrCreate(
                ['user_id' => Auth::id(), 'order_status' => 0],
                [
                    'order_number' => $orderNumber,
                    'address_id' => $address_id,
                    'delivery_id' => $delivery_id,
                    'order_final_amount' =>  $order_final_amount,
                ]
            );
            return $order;

        } catch (\Throwable $e) {

            session()->flash('error',__('messages.An_error_occurred'));
            return redirect()->back();
        }

    }


    private function makeOrderItems($order)
    {

        $user = Auth::id();
        $cartItems = CartItems::where('user_id', $user)->get();

        try {

            $currentOrderItems = OrderItem::where('order_id', $order->id)->where('user_id', $order->user_id)->exists();
            if ($currentOrderItems)
            {

                OrderItem::where('order_id', $order->id)->where('user_id', $order->user_id)->delete();
                foreach ($cartItems as $item) {
                    OrderItem::Create([
                        'user_id' => $user,
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'number' => $item->number,
                        'final_product_price' => $item->cartItemProductPriceWithOutNumber(),
                        'final_total_price' => $item->cartItemFinalPrice(),
                    ]);
                }

            } else {

                foreach ($cartItems as $item)
                {
                    OrderItem::Create([
                        'user_id' => $user,
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'number' => $item->number,
                        'final_product_price' => $item->cartItemProductPriceWithOutNumber(),
                        'final_total_price' => $item->cartItemFinalPrice(),
                    ]);
                }

            }
        } catch (\Throwable $e) {

            session()->flash('error',__('messages.An_error_occurred'));
            return redirect()->back();
        }

    }


    private function makePayment($order)
    {

        try {
            return Payment::updateOrCreate(
                ['order_id' => $order->id, 'status' => 0],
                [
                    'amount' => $order->order_final_amount,
                    'user_id' => $order->user_id,
                    'order_id' => $order->id,
                ]
            );
        } catch (\Throwable $e)
         {
            session()->flash('error',__('messages.An_error_occurred'));
            return redirect()->back();
        }

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
