<?php

namespace App\Http\Requests;

use App\Dto\InstantPaymentDto;
use App\Enums\SystemEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstantPaymentRequest extends FormRequest
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
            'system' => ['required', 'string', Rule::in(SystemEnum::getInstantKeys())],
            'currency' => ['required', 'string'],
            'wallet' => ['required', 'string'],
            'comment' => ['required', 'string'],
            'paid_commission' => ['nullable'], 
            'tag' => ['nullable'],
            'real_fee' => ['nullable'],
            'priority' => ['nullable']
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
        return new InstantPaymentDto($this->validated());
    }
}
