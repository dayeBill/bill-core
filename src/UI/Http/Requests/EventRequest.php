<?php

namespace DayeBill\BillCore\UI\Http\Requests;

class EventRequest
{
    public function rules()
    {
        return [
            'owner_type' => ['required'],
            'owner_id'   => ['required'],
            'subject'    => ['required'],
            'event_date' => ['required', 'date'],
            'amount'     => ['required', 'integer'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
