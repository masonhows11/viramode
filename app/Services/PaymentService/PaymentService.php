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
    private RequestInterface $request;

    public function __construct($provider_name,RequestInterface $request)
    {
        $this->provider_name = $provider_name;
        $this->request = $request;
    }


    private function findProvider()
    {

       // dd($this->provider_name);
        $providerClassName = 'App\\Services\\PaymentService\\Gateways\\' . $this->provider_name;
       // dd($providerClassName);
        if (!class_exists($providerClassName)) {
            throw new ProviderNotFoundException(__('messages.the_selected_payment_gateway_could_not_be_found'));
        }

        return new $providerClassName($this->request);
    }


    public function pay()
    {
        try {
            return $this->findProvider()->pay();
        } catch (ProviderNotFoundException $e) {
            return $e->getMessage();
        }
    }


    public function verify()
    {
        try {
            return $this->findProvider()->verify();
        } catch (ProviderNotFoundException $e) {
            return $e->getMessage();
        }
    }

}
