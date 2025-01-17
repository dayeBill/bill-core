<?php

namespace DayeBill\BillCore\UI\Http\Resources;

use DayeBill\BillCore\Domain\Models\Bill;
use Illuminate\Http\Request;
use RedJasmine\Support\UI\Http\Resources\Json\JsonResource;

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
            'contact_id'      => $this->contact_id,
            'bill_type'       => $this->bill_type->value,
            'amount_currency' => $this->amount_currency,
            'amount_value'    => $this->amount_value,
            'payee_type'      => $this->payee_type,
            'payee_id'        => $this->payee_id,
            'pay_method'      => $this->pay_method,
            'bill_time'       => $this->bill_time,
            'remarks'         => $this->remarks,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
