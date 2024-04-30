<?php

namespace App\Http\Requests\PaymentRequest;

use Illuminate\Foundation\Http\FormRequest;

class GateWayTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'paymentType' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'paymentType.required' => 'درگاه پرداخت مورد نظر را انتخاب کنید',
        ];
    }
}
