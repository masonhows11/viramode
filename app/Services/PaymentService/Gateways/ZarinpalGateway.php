<?php


namespace App\Services\PaymentService\Gateways;


use App\Services\PaymentService\Interfaces\AbstractGatewayConstructor;
use App\Services\PaymentService\Interfaces\PayableInterface;
use App\Services\PaymentService\Interfaces\VerifyInterface;

class ZarinpalGateway extends AbstractGatewayConstructor implements PayableInterface , VerifyInterface
{


    public function pay()
    {

    }

    public function verify()
    {

    }
}
