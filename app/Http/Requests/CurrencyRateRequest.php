<?php

namespace App\Http\Requests;

use App\Dto\CurrencyRateDto;
use App\Enums\CurrencyEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurrencyRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'currency_in' => ['string', Rule::in(CurrencyEnum::CURRENCIES)],
            'currency_out' => ['string', Rule::in(CurrencyEnum::CURRENCIES)]
        ];
    }

    public function getDto()
    {
        return new CurrencyRateDto($this->all());
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'currency_in' => strtoupper($this->currency_in),
            'currency_out' => strtoupper($this->currency_out),
        ]);
    }
}
