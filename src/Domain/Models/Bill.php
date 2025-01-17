<?php

namespace DayeBill\BillCore\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_type',
        'owner_id',
        'event_id',
        'contacts_id',
        'bill_type',
        'amount_currency',
        'payee_type',
        'payee_id',
        'pay_method',
        'amount_value',
        'bill_date',
        'remarks',
    ];

    protected function casts()
    {
        return [
            'bill_date' => 'datetime',
        ];
    }
}
