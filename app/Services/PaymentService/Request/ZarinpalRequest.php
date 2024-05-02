<?php


namespace App\Services\PaymentService\Request;


use App\Services\PaymentService\Interfaces\RequestInterface;

class ZarinpalRequest implements RequestInterface
{
    private $user;
    private $amount;
    private $apiKey;

    public function __construct(array $data)
    {
        $this->user = $data['user'];
        $this->amount = $data['amount'];
        $this->apiKey = $data['apiKey'];
    }

    public function getAmount()
    {
        return $this->amount;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function getApiKey()
    {
        return $this->apiKey;
    }
}
