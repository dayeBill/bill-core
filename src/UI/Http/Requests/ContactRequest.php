<?php

namespace DayeBill\BillCore\UI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules() : array
    {
        return [

            'name'          => ['required', 'max:100'],
            'alias'         => ['nullable', 'sometimes', 'max:100'],
            'relation_type' => ['nullable', 'sometimes', 'max:100'],
            'phone_number'  => ['nullable', 'sometimes', 'max:100'],
            'remarks'       => ['nullable', 'sometimes', 'max:100'],
        ];
    }

    public function authorize() : bool
    {
        return true;
    }
}
