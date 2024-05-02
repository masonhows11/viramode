<?php


namespace App\Services\PaymentService\Gateways;


use App\Services\PaymentService\Interfaces\AbstractGatewayConstructor;
use App\Services\PaymentService\Interfaces\PayableInterface;
use App\Services\PaymentService\Interfaces\VerifyInterface;

class ZarinpalGateway extends AbstractGatewayConstructor implements PayableInterface , VerifyInterface
{


    public function pay()
    {
        session()->flash('error', __('messages.this_part_is_being_prepared'));
        return  redirect()->back();
    }

    public function verify()
    {
        session()->flash('error', __('messages.this_part_is_being_prepared'));
        return  redirect()->back();
    }
}
