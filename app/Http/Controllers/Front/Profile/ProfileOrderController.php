<?php

namespace App\Http\Controllers\Front\Profile;

use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileOrderController extends Controller
{


    public function allOrders()
    {

        try {

            $user = Auth::id();
            $orders = Order::where('user_id', $user)->orderBy('id', 'asc')->paginate(8);
            return view('front_end.profile.orders.all_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function currentOrders()
    {
        try {
            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 0)->orderBy('id', 'asc')->paginate(8);
            return view('front_end.profile.orders.current_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }


    public function paidOrders()
    {
        try {
            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 1)->orderBy('id', 'asc')->paginate(8);
            return view('front_end.profile.orders.paid_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function unPaidOrders()
    {
        try {

            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 2)->orderBy('id', 'asc')->paginate(8);
            return view('front_end.profile.orders.unPaid_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function orderReturnedRequest()
    {
        try {
            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 3)->orderBy('id', 'asc')->paginate(8);
            return view('front_end.profile.orders.return_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function orderDetails(Order $order)
    {
        try {

            $user = Auth::id();
            $address = $order->address;
            $delivery = $order->delivery;
            $order_items = OrderItem::where('user_id', $user)->where('order_id', $order->id)->get();
            return view('front_end.profile.order_details.order_details',
             ['order_items' => $order_items, 'order' => $order ,
             'address' => $address ,'delivery'=> $delivery]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }
}
