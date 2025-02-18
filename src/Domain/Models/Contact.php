<?php

namespace DayeBill\BillCore\Domain\Models;


use DayeBill\BillCore\Domain\Events\Contacts\ContactCreatedEvent;
use DayeBill\BillCore\Domain\Models\Traits\SumAmounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use RedJasmine\Support\Domain\Models\OwnerInterface;
use RedJasmine\Support\Domain\Models\Traits\HasOwner;
use RedJasmine\Support\Domain\Models\Traits\HasSnowflakeId;

class Contact extends Model implements OwnerInterface
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    public $uniqueShortId = true;

    use HasSnowflakeId;

    use HasOwner;

    protected $dispatchesEvents = [
        'created' => ContactCreatedEvent::class,
    ];

    protected $fillable = [
        'owner_type',
        'owner_id',
        'name',
        'relation_type',
        'phone_number',
        'remarks',
    ];

    protected function casts() : array
    {
        return [
            'phone_number' => 'encrypted'

        ];
    }


    public function bills() : HasMany
    {
        return $this->hasMany(Bill::class, 'contact_id', 'id');
    }

    use SumAmounts;
}
