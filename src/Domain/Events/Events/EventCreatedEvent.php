<?php

namespace DayeBill\BillCore\Domain\Events\Events;

use DayeBill\BillCore\Domain\Models\Event;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use RedJasmine\Payment\Domain\Models\Refund;

class EventCreatedEvent implements ShouldDispatchAfterCommit
{

    use Dispatchable;


    public function __construct(public readonly Event $event)
    {
    }
}

