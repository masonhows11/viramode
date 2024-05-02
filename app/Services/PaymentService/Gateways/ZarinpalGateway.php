<?php


namespace App\Services\PaymentService\Gateways;


use App\Services\PaymentService\Interfaces\AbstractGatewayConstructor;
use App\Services\PaymentService\Interfaces\PayableInterface;
use App\Services\PaymentService\Interfaces\VerifyInterface;

class ZarinpalGateway extends AbstractGatewayConstructor implements PayableInterface , VerifyInterface
{


    public function pay()
    {
       return 'hi this is zarinpal pay';
    }

    public function verify()
    {
        return 'hi this is zarinpal verify';
    }
}
