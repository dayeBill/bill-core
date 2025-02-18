<?php

namespace DayeBill\BillCore\Domain\Models\Traits;

use DayeBill\BillCore\Domain\Models\Enums\BillTypeEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

trait SumAmounts
{
    public function sumAmounts() : array
    {
        $summary = $this->bills()->select([
            'bill_type', DB::raw('SUM(amount_value) as amount_value')
        ])->groupBy('bill_type')->get()->toArray();

        $summary = Arr::pluck($summary, 'amount_value', 'bill_type');
        foreach (BillTypeEnum::values() as $value) {
            $summary[$value] = (int) ($summary[$value] ?? 0);
        }
        return $summary;
    }

}