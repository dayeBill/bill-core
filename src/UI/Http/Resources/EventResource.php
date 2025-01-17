<?php

namespace DayeBill\BillCore\UI\Http\Resources;

use DayeBill\BillCore\Domain\Models\Event;
use Illuminate\Http\Request;
use RedJasmine\Support\UI\Http\Resources\Json\JsonResource;

/** @mixin Event */
class EventResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id'         => $this->id,
            'owner_type' => $this->owner_type,
            'owner_id'   => $this->owner_id,
            'subject'    => $this->subject,
            'event_date' => $this->event_date,
            'amount'     => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
