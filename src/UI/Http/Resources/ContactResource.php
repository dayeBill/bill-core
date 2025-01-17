<?php

namespace DayeBill\BillCore\UI\Http\Resources;

use DayeBill\BillCore\Domain\Models\Contact;
use Illuminate\Http\Request;
use RedJasmine\Support\UI\Http\Resources\Json\JsonResource;

/** @mixin Contact */
class ContactResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id'            => $this->id,
            'owner_type'    => $this->owner_type,
            'owner_id'      => $this->owner_id,
            'name'          => $this->name,
            'relation_type' => $this->relation_type,
            'phone_number'  => $this->phone_number,
            'remarks'       => $this->remarks,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
