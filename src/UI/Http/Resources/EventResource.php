<?php

namespace DayeBill\BillCore\UI\Http\Resources;

use DayeBill\BillCore\Domain\Models\Event;
use Illuminate\Http\Request;
use RedJasmine\Support\UI\Http\Resources\Json\JsonResource;

/** @mixin Event */
class EventResource extends JsonResource
{
    public function toArray(Request $request) : array
    {

        return [
            'id'         => $this->id,
            'owner_type' => $this->owner_type,
            'owner_id'   => $this->owner_id,
            'type'       => $this->type->value,
            'subject'    => $this->subject,
            'color'      => $this->color,
            'remarks'    => $this->remarks,
            'event_date' => $this->event_date?->format('Y-m-d'),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d hH:i:s'),
        ];
    }
}
