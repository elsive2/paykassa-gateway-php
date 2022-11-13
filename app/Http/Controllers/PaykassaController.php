<?php

namespace App\Http\Controllers;

use App\Dto\PaymentDto;
use App\Enums\SystemEnum;
use App\Http\Requests\CurrencyRateRequest;
use App\Http\Requests\InstantPaymentRequest;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\PrivateHashRequest;
use App\Lib\PayKassaAPI;
use App\Lib\PayKassaSCI;
use App\Services\PaykassaService;
use Illuminate\Http\Request;

class PaykassaController extends Controller
{
    public function __construct(
        private PaykassaService $paykassaService
    ) { }

    public function getPaymentAddress(PaymentRequest $request)
    {
        return $this->paykassaService->getPaymentAddress($request->getDto());
    }

    public function invoiceForPayment(PaymentRequest $request)
    {
        return $this->paykassaService->invoiceForPayment($request->getDto());
    }

    public function checkPayment(PrivateHashRequest $request)
    {
        return $this->paykassaService->checkPayment($request->private_hash);
    }

    public function notificationsForTransactions(PrivateHashRequest $request)
    {
        return $this->paykassaService->processNotifications($request->private_hash);
    }

    public function instantPayment(InstantPaymentRequest $request)
    {
        return $this->paykassaService->instantPayment($request->getDto());
    }

    public function getBalance()
    {
        return $this->paykassaService->getBalance();
    }

    public function getCurrencyRate(CurrencyRateRequest $request)
    {
        return $this->paykassaService->getCurrencyRate($request->getDto());
    }
}
