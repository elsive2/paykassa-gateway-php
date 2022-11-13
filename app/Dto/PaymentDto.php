<?php

namespace App\Dto;

class PaymentDto
{
    public float $amount;
    public string $system;
    public string $currency;
    public string $order_id;
    public string $comment;
    public string $phone;
    public string $paid_commission;
    public mixed $static;


    public function __construct(array $data) { 
        $this->amount = $data['amount'];
        $this->system = $data['system'];
        $this->currency = $data['currency'];
        $this->order_id = $data['order_id'];
        $this->comment = $data['comment'];
        $this->phone = $data['phone'] ?? false;
        $this->paid_commission = $data['paid_commission'] ?? "";
        $this->static = $data['static'] ?? "no";
    }
}