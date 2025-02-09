<?php

namespace DayeBill\BillCore\Application\Services\Bill\Queries;

use Carbon\Carbon;
use DayeBill\BillCore\Domain\Models\Enums\BillTypeEnum;
use RedJasmine\Support\Domain\Data\Queries\Query;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Casts\EnumCast;

class BillSummaryQuery extends Query
{

    #[WithCast(DateTimeInterfaceCast::class, 'Y-m')]
    public Carbon $month;


    #[WithCast(EnumCast::class, BillTypeEnum::class)]
    public ?BillTypeEnum $billType;

}