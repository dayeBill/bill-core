<?php

namespace DayeBill\BillCore\Domain\Events\Bills;

use DayeBill\BillCore\Domain\Models\Bill;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use RedJasmine\Payment\Domain\Models\Refund;

class BillCreatedEvent implements ShouldDispatchAfterCommit
{

    use Dispatchable;


    public function __construct(public readonly Bill $bill)
    {
    }
}

