<?php

namespace DayeBill\BillCore\UI\Http\Requests;

class ContactRequest
{
    public function rules()
    {
        return [
            'owner_type'    => ['required'],
            'owner_id'      => ['required'],
            'name'          => ['required'],
            'relation_type' => ['nullable'],
            'phone_number'  => ['nullable'],
            'remarks'       => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
