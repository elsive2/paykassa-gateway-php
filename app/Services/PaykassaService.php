<?php

namespace App\Services;

use App\Dto\InstantPaymentDto;
use App\Dto\PaymentDto;
use App\Enums\SystemEnum;
use App\Paykassa\PayKassaAPI;
use App\Paykassa\PayKassaSCI;

class PaykassaService
{
    private PayKassaAPI $payKassaApi;
    private PayKassaSCI $payKassaSci;

    public function __construct()
    {
        $this->payKassaApi = new PayKassaAPI(config('app.paykassa_api_id'), config('app.paykassa_api_key'), config('app.paykassa_api_test'));
        $this->payKassaSci = new PayKassaSCI(config('app.paykassa_sci_id'), config('app.paykassa_sci_key'), true);
    }
    
    public function getPaymentAddress(PaymentDto $data)
    {
        $response = $this->payKassaSci->sci_create_order_get_data(
            $data->amount,
            $data->currency,
            $data->order_id,
            $data->comment,
            SystemEnum::$SYSTEMS_ID[strtolower($data->system)],
            $data->phone ?? false,
            $data->paid_commission ?? "",
            $data->static ?? "no"
        );

        if ($response['error'])
            return ['error' => $response['message']];
    
        return ['data' => $response['data']];
    }

    public function invoiceForPayment(PaymentDto $data)
    {
        $response = $this->payKassaSci->sci_create_order(
            $data->amount,
            $data->currency,
            $data->order_id,
            $data->comment,
            SystemEnum::$SYSTEMS_ID[strtolower($data->system)],
            $data->phone ?? false,
            $data->paid_commission ?? "",
            $data->static ?? "no"
        );

        if ($response['error'])
            return ['error' => $response['message']];
    
        return ['data' => $response['data']];
    }

    public function checkPayment(string $privateHash)
    {
        $response = $this->payKassaSci->sci_confirm_order($privateHash);

        if ($response['error'])
            return ['error' => $response['message']];
    
        return ['data' => $response['data']];        
    }

    public function processNotifications(string $privateHash)
    {
        $response = $this->payKassaSci->sci_confirm_transaction_notification($privateHash);

        if ($response['error'])
            return ['error' => $response['message']];
    
        return ['data' => $response['data']];   
    }

    public function instantPayment(InstantPaymentDto $data)
    {
        $response = $this->payKassaApi->api_payment(
            config('app.paykassa_sci_id'),
            SystemEnum::$INSTANT_SYSTEMS_ID[$data->system],
            $data->wallet,
            $data->amount,
            $data->currency,
            $data->comment,
            $data->paid_commission,
            $data->tag,
            $data->real_fee,
            $data->priority
        );
        
        if ($response['error'])
            return ['error' => $response['message']];
    
        return ['data' => $response['data']];   
    }
}