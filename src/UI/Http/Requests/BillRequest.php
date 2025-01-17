<?php

namespace DayeBill\BillCore\UI\Http\Requests;

class BillRequest
{
    public function rules()
    {
        return [
            'owner_type'      => ['required'],
            'owner_id'        => ['required'],
            'event_id'        => ['nullable', 'integer'],
            'contacts_id'     => ['required', 'integer'],
            'bill_type'       => ['required'],
            'amount_currency' => ['required'],
            'payee_type'      => ['nullable'],
            'payee_id'        => ['nullable'],
            'pay_method'      => ['nullable'],
            'amount_value'    => ['required', 'integer'],
            'bill_time'       => ['required', 'date'],
            'remarks'         => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
