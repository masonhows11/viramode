<?php


namespace App\Services\PaymentService;

use App\Services\PaymentService\Interfaces\RequestInterface;
use App\Services\PaymentService\Exceptions\ProviderNotFoundException;

class PaymentService
{

    // public const IDPAY = 'IDPayGateway';
    // public const ZARRINPAL = 'ZarinpalGateway';
    // public const MELLAT = 'MellatGateway';

    private $provider_name;
    // RequestInterface $request  means that request is type of payment gateway we used for pay
    // private RequestInterface $request;

    private RequestInterface $request;

    // RequestInterface $request  means that request is type of payment gateway we used for pay
    public function __construct($provider_name,RequestInterface $request)
    {
        $this->provider_name = $provider_name;
        $this->request = $request;
    }

    // for find payment provider
    // gateway like zarinpal or idPay or melLat
    private function findProvider()
    {
        // find provider
        $providerClassName = 'App\\Services\\PaymentService\\Gateways\\' . $this->provider_name;

        if (!class_exists($providerClassName)) {
            throw new ProviderNotFoundException(__('messages.the_selected_payment_gateway_could_not_be_found'));
        }

        // create an instance from founded class
        // give request to construct that made as abstract class for gateway providers
        // return created gateway instance
        return new $providerClassName($this->request);
    }


    public function pay()
    {
        try {
            // the pay() method is defined in interface
            return $this->findProvider()->pay();
        } catch (ProviderNotFoundException $e) {
            return $e->getMessage();
        }
    }


    public function verify()
    {
        try {
            // the verify() method is defined in interface
            return $this->findProvider()->verify();
        } catch (ProviderNotFoundException $e) {
            return $e->getMessage();
        }
    }

}
