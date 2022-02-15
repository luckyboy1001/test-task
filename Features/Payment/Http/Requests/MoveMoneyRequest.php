<?php

namespace Features\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MoveMoneyRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "amount" => ['required', 'numeric'],
            "description" => ['required', 'max:30'],
            "destinationFirstname" => ['required', 'max:33', 'min:2'],
            "destinationLastname" => ['required', 'max:33', 'min:2'],
            "destinationNumber" => ['required', 'max:26', 'min:26'],
            "paymentNumber" => ['sometimes', 'max:30'],
            "deposit" => ['sometimes'],
            "sourceFirstName" => ['sometimes'],
            "sourceLastName" => ['sometimes'],
            "reasonDescription" => ['sometimes'],
        ];
    }


}
