<?php

namespace App\Http\Controllers\Front\Profile;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileOrderController extends Controller
{


    public function allOrders(Request $request)
    {

        // if (isset(request()->status) && isset(request()->type) && $request->type === 'order_delivered') {

        //     $orders = Order::where('user_id', $user)->where('delivery_status', request()->status)->orderBy('id', 'asc')->paginate(5);

        // } elseif (isset(request()->status)) {
        //     $orders = Order::where('user_id', $user)->where('order_status', request()->status)->orderBy('id', 'asc')->paginate(5);

        // } else {
        //     $orders = Order::where('user_id', $user)->orderBy('id', 'asc')->paginate(5);
        // }


        try {

            $user = Auth::id();
            $orders = Order::where('user_id', $user)->orderBy('id', 'asc')->paginate(5);
            return view('front_end.profile.orders.all_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function currentOrders()
    {
        try {
            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 0)->orderBy('id', 'asc')->paginate(5);
            return view('front_end.profile.orders.current_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }


    public function paidOrders()
    {
        try {
            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 1)->orderBy('id', 'asc')->paginate(5);
            return view('front_end.profile.orders.paid_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function unPaidOrders()
    {
        try {

            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 2)->orderBy('id', 'asc')->paginate(5);
            return view('front_end.profile.orders.unPaid_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function orderReturnedRequest()
    {
        try {
            $user = Auth::id();
            $orders = Order::where('user_id', $user)->where('order_status', 2)->orderBy('id', 'asc')->paginate(5);
            return view('front_end.profile.orders.return_orders', ['orders' => $orders]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }

    public function orderDetails(Request $request)
    {
        try {
            $user = Auth::id();
            $order = Order::findOrFail($request->order);
            $order_items = OrderItem::where('user_id', $user)->where('order_id', $request->order)->get();
            return view('front_end.profile.order_details.order_details', ['order_items' => $order_items, 'order' => $order]);

        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }
    }
}
