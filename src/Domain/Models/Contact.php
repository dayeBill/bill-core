<?php

namespace DayeBill\BillCore\Domain\Models;

use DayeBill\BillCore\Domain\Models\Enums\ContactRelationTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RedJasmine\Support\Domain\Models\Traits\HasSnowflakeId;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    public $uniqueShortId = true;

    use HasSnowflakeId;

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
            'relation_type' => ContactRelationTypeEnum::class
        ];
    }
}
