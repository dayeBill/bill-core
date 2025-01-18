<?php

namespace DayeBill\BillCore\UI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules() : array
    {
        return [

            'name'          => ['required'],
            'relation_type' => ['nullable'],
            'phone_number'  => ['nullable'],
            'remarks'       => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
