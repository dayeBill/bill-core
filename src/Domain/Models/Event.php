<?php

namespace DayeBill\BillCore\Domain\Models;

use DayeBill\BillCore\Domain\Events\Events\EventCreatedEvent;
use DayeBill\BillCore\Domain\Models\Enums\BillTypeEnum;
use DayeBill\BillCore\Domain\Models\Enums\EventTypeEnum;
use DayeBill\BillCore\Domain\Models\Traits\SumAmounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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


    protected $dispatchesEvents = [
        'created' => EventCreatedEvent::class,
    ];
    protected $fillable         = [
        'owner_type',
        'owner_id',
        'subject',
        'type',
        'event_date',
        'color',
        'remarks',
    ];

    protected function casts() : array
    {
        return [
            'event_date' => 'date',
            'type'       => EventTypeEnum::class
        ];
    }


    public function bills() : HasMany
    {
        return $this->hasMany(Bill::class, 'event_id', 'id');
    }

    use SumAmounts;
}
