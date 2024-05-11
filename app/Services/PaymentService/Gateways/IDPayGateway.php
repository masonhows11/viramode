<?php


namespace App\Services\PaymentService\Gateways;


use App\Services\PaymentService\Interfaces\AbstractGatewayConstructor;
use App\Services\PaymentService\Interfaces\PayableInterface;
use App\Services\PaymentService\Interfaces\VerifyInterface;

//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Config;

class IDPayGateway extends AbstractGatewayConstructor implements PayableInterface, VerifyInterface
{

    private const StatusOk = 100;
    private const StatusOKAlready = 101;

    public function pay()
    {


        $info = $this->request;
        $full_user = $info->getUser()->first_name . ' ' . $info->getUser()->last_name;
        $callBack = route('payment.verify');
        $params = array(
            'order_id' => $info->getOrderId(),
            'amount' => $info->getAmount(),
            'name' => $full_user,
            'phone' => $info->getUser()->mobile,
            'mail' => $info->getUser()->email,
            'desc' => 'توضیحات پرداخت کننده',
            'callback' => $callBack,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: ' . $this->request->getApiKey() . '',
            'X-SANDBOX: 1' // for real gateway comment the sandbox line
        ));
        $result = curl_exec($ch);
        if($result == false){
            session()->flash('error',__('messages.communication_with_the_payment_gateway_is_not_established'));
            return redirect()->back();
        }

        curl_close($ch);
        $send_result = json_decode($result, true);
        if (isset($send_result['error_code'])) {
            throw  new \InvalidArgumentException($send_result['error_message']);
        }

        return redirect()->away($send_result['link']);
    }

    public function verify()
    {

        $params = array(
            'id' => $this->request->getId(),
            'order_id' => $this->request->getOrderId(),
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: ' . $this->request->getApiKey() . '',
            'X-SANDBOX: 1',
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        // dd($result);



        // verify failed
        if (isset($result['error_code']))
        {
            return [
                'status' => false,
                'order_id' => $this->request->getOrderId(),
                'statusCode' => $result['error_code'],
                'gateway' => $this->request->getGateway(),
                'msg' => $result['error_message'],
            ];
        }  // verify successfully
        if ($result['status'] == self::StatusOk) {
            return [
                'status' => true,
                'order_id' => $result['order_id'],
                'statusCode' => $result['status'],
                'gateway' => $this->request->getGateway(),
                'data' => $result,
            ];
        }   // already verified  successfully
        if ($result['status'] == self::StatusOKAlready) {
            return [
                'status' => true,
                'order_id' => $result['order_id'],
                'statusCode' => $result['status'],
                'gateway' => $this->request->getGateway(),
                'data' => $result,
            ];
        }
        return [
            'status' => true,
            'order_id' => $result['order_id'],
            'statusCode' => $result['status'],
            'data' => $result,
        ];

    }
}
