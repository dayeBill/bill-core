<?php

namespace DayeBill\BillCore\UI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
{
    public function rules() : array
    {
        return [
            'event_id'        => ['nullable', 'integer'],
            'contacts_id'     => ['nullable', 'integer'],
            'bill_type'       => ['required'],
            'amount.currency' => ['required'],
            'amount.value'    => ['required', 'integer'],
            'payee_type'      => ['nullable'],
            'payee_id'        => ['nullable'],
            'pay_method'      => ['nullable'],
            'bill_time'       => ['required',],
            'remarks'         => ['nullable'],
        ];
    }

    public function authorize() : bool
    {
        return true;
    }
}
