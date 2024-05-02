<?php


namespace App\Services\OrderNumber;


use App\Models\Order;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class OrderNumberServices
{
    public static function  generateNumber()
    {
        // define("PREFIX" ,"vrm");
        // $number = PREFIX  . mt_rand(111111, 999999);

        $current = str_replace('-', '',  Carbon::now()->toDateString());
        $number = $current . mt_rand(111111, 999999);
        if (self::existNumber($number)) {

            return  $number = $current . mt_rand(111111, 999999);
        }
        return $number;

    }

    public static function existNumber($number)
    {
        return Order::where('order_number', $number)->exists();
    }
}
