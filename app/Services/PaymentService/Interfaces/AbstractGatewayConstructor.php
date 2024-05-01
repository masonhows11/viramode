<?php


namespace App\Services\PaymentService\Interfaces;


// make constructor for all payment providers
abstract class AbstractGatewayConstructor
{
    // when set Access level this property as protected
    // the child class can access to
    protected $request;

    // this abstract class  initial value  gateway request like IdPayGateway
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }
}
