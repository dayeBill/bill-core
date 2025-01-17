<?php

namespace DayeBill\BillCore\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RedJasmine\Support\Domain\Models\OwnerInterface;
use RedJasmine\Support\Domain\Models\Traits\HasOwner;
use RedJasmine\Support\Domain\Models\Traits\HasSnowflakeId;

class Event extends Model implements OwnerInterface
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    public $uniqueShortId = true;

    use HasOwner;

    use HasSnowflakeId;

    protected $fillable = [
        'owner_type',
        'owner_id',
        'subject',
        'event_date',
        'amount',
    ];

    protected function casts() : array
    {
        return [
            'event_date' => 'date',
        ];
    }
}
