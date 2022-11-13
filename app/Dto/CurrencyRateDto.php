<?php

namespace App\Dto;

class CurrencyRateDto
{
    public string $currency_in;
    public string $currency_out;

    public function __construct(array $data) {
        $this->currency_in = $data['currency_in'];
        $this->currency_out = $data['currency_out'];
    }
}