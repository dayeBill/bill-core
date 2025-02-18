<?php

namespace DayeBill\BillCore\UI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
{
    public function rules() : array
    {
        return [
            'bill_type'       => ['required'],
            'amount.currency' => ['required'],
            'amount.value'    => ['required', 'integer'],
            'bill_time'       => ['required',],
            'event_id'        => ['nullable', 'integer'],
            'contacts_id'     => ['nullable', 'integer'],
            'payee_type'      => ['nullable'],
            'payee_id'        => ['nullable'],
            'pay_method'      => ['nullable'],
            'remarks'         => ['nullable'],
        ];
    }

    public function authorize() : bool
    {
        return true;
    }
}
