<?php


namespace App\Services\PaymentService\Gateways;


use App\Services\PaymentService\Interfaces\AbstractProviderConstructor;
use App\Services\PaymentService\Interfaces\PayableInterface;
use App\Services\PaymentService\Interfaces\VerifyInterface;

class ZarinpalGateway extends AbstractProviderConstructor implements PayableInterface , VerifyInterface
{


    public function pay()
    {

    }

    public function verify()
    {

    }
}
