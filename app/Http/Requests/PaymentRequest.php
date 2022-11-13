<?php

namespace App\Http\Requests;

use App\Dto\PaymentDto;
use App\Enums\SystemEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
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
            'amount' => ['required', 'numeric'],
            'system' => ['required', Rule::in(SystemEnum::getKeys())],
            'currency' => ['required', 'string'],
            'order_id' => ['required', 'string'],
            'comment' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'paid_commission' => ['nullable'],
            'static' => ['nullable'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'system' => strtolower($this->system),
        ]);
    }

    public function getDto()
    {
        return new PaymentDto($this->validated());
    }
}
