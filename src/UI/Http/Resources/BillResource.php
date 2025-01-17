<?php

namespace DayeBill\BillCore\UI\Http\Resources;

use DayeBill\BillCore\Domain\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Bill */
class BillResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id'              => $this->id,
            'owner_type'      => $this->owner_type,
            'owner_id'        => $this->owner_id,
            'event_id'        => $this->event_id,
            'contacts_id'     => $this->contacts_id,
            'bill_type'       => $this->bill_type,
            'amount_currency' => $this->amount_currency,
            'payee_type'      => $this->payee_type,
            'payee_id'        => $this->payee_id,
            'pay_method'      => $this->pay_method,
            'amount_value'    => $this->amount_value,
            'bill_date'       => $this->bill_date,
            'remarks'         => $this->remarks,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
