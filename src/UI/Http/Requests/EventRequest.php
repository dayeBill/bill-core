<?php

namespace DayeBill\BillCore\UI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules() : array
    {
        return [
            'type'       => ['required'],
            'subject'    => ['required'],
            'event_date' => ['required', 'date'],
            'color'      => ['sometimes', 'max:20'],
            'remarks'    => ['sometimes', 'max:200'],

        ];
    }

    public function authorize():bool
    {
        return true;
    }
}
