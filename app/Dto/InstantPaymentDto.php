<?php

namespace App\Dto;

class InstantPaymentDto
{
    public float $amount;
    public string $system;
    public string $currency;
    public string $wallet;
    public string $comment;
    public string $paid_commission;
    public string $tag;
    public $real_fee;
    public string $priority;

    public function __construct(array $data) { 
        $this->amount = $data['amount'];
        $this->system = $data['system'];
        $this->currency = $data['currency'];
        $this->wallet = $data['wallet'];
        $this->comment = $data['comment'];
        $this->paid_commission = $data['paid_commission'] ?? "";
        $this->tag = $data['tag'] ?? "";
        $this->real_fee = $data['real_fee'] ?? true;
        $this->priority = $data['priority'] ?? 'high';
    }
}