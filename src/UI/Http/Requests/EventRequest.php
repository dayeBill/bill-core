<?php

namespace DayeBill\BillCore\UI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules()
    {
        return [

            'type'       => ['required'],
            'subject'    => ['required'],
            'event_date' => ['required', 'date'],

        ];
    }

    public function authorize()
    {
        return true;
    }
}
