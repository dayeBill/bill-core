<?php

namespace DayeBill\BillCore\Domain\Models;

use DayeBill\BillCore\Domain\Events\Bills\BillCreatedEvent;
use DayeBill\BillCore\Domain\Models\Enums\BillTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use RedJasmine\Support\Domain\Casts\MoneyCast;
use RedJasmine\Support\Domain\Models\OwnerInterface;
use RedJasmine\Support\Domain\Models\Traits\HasOwner;
use RedJasmine\Support\Domain\Models\Traits\HasSnowflakeId;

class Bill extends Model implements OwnerInterface
{
    use HasFactory, SoftDeletes;


    public $incrementing = false;


    use HasSnowflakeId;

    use HasOwner;

    protected $dispatchesEvents = [
        'created' => BillCreatedEvent::class,
    ];

    protected $fillable = [
        'owner_type',
        'owner_id',
        'event_id',
        'category',
        'contacts_id',
        'bill_type',
        'amount_currency',
        'payee_type',
        'payee_id',
        'pay_method',
        'amount_value',
        'bill_time',
        'remarks',
    ];

    protected function casts() : array
    {
        return [
            'bill_type' => BillTypeEnum::class,
            'bill_time' => 'datetime',
            'amount'    => MoneyCast::class,
        ];
    }


    public function contact() : BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
